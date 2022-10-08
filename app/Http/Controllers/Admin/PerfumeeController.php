<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPerfumeeRequest;
use App\Http\Requests\StorePerfumeeRequest;
use App\Http\Requests\UpdatePerfumeeRequest;
use App\Models\Perfumee;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PerfumeeController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('perfumee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perfumees = Perfumee::with(['media'])->get();

        return view('admin.perfumees.index', compact('perfumees'));
    }

    public function create()
    {
        abort_if(Gate::denies('perfumee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perfumees.create');
    }

    public function store(StorePerfumeeRequest $request)
    {
        $perfumee = Perfumee::create($request->all());

        if ($request->input('image', false)) {
            $perfumee->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $perfumee->id]);
        }

        return redirect()->route('admin.perfumees.index');
    }

    public function edit(Perfumee $perfumee)
    {
        abort_if(Gate::denies('perfumee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perfumees.edit', compact('perfumee'));
    }

    public function update(UpdatePerfumeeRequest $request, Perfumee $perfumee)
    {
        $perfumee->update($request->all());

        if ($request->input('image', false)) {
            if (!$perfumee->image || $request->input('image') !== $perfumee->image->file_name) {
                if ($perfumee->image) {
                    $perfumee->image->delete();
                }
                $perfumee->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($perfumee->image) {
            $perfumee->image->delete();
        }

        return redirect()->route('admin.perfumees.index');
    }

    public function show(Perfumee $perfumee)
    {
        abort_if(Gate::denies('perfumee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perfumee->load('perfumePerfumeOrders');

        return view('admin.perfumees.show', compact('perfumee'));
    }

    public function destroy(Perfumee $perfumee)
    {
        abort_if(Gate::denies('perfumee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perfumee->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerfumeeRequest $request)
    {
        Perfumee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('perfumee_create') && Gate::denies('perfumee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Perfumee();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
