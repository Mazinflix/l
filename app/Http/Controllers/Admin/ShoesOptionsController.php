<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyShoesOptionRequest;
use App\Http\Requests\StoreShoesOptionRequest;
use App\Http\Requests\UpdateShoesOptionRequest;
use App\Models\Shoe;
use App\Models\ShoesOption;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ShoesOptionsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('shoes_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoesOptions = ShoesOption::with(['shoe', 'media'])->get();

        $shoes = Shoe::get();

        return view('admin.shoesOptions.index', compact('shoes', 'shoesOptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('shoes_option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoes = Shoe::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.shoesOptions.create', compact('shoes'));
    }

    public function store(StoreShoesOptionRequest $request)
    {
        $option = $request->color ." ". $request->size ." ". $request->type;
        $shoesOption = ShoesOption::create(array_merge($request->validated(), ['option' => $option]));

        if ($request->input('image', false)) {
            $shoesOption->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $shoesOption->id]);
        }

        return redirect()->route('admin.shoes-options.index');
    }

    public function edit(ShoesOption $shoesOption)
    {
        abort_if(Gate::denies('shoes_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoes = Shoe::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shoesOption->load('shoe');

        return view('admin.shoesOptions.edit', compact('shoes', 'shoesOption'));
    }

    public function update(UpdateShoesOptionRequest $request, ShoesOption $shoesOption)
    {
        $option = $request->color ." ". $request->size ." ". $request->type;
        $shoesOption->update(array_merge($request->validated(), ['option' => $option]));

        if ($request->input('image', false)) {
            if (!$shoesOption->image || $request->input('image') !== $shoesOption->image->file_name) {
                if ($shoesOption->image) {
                    $shoesOption->image->delete();
                }
                $shoesOption->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($shoesOption->image) {
            $shoesOption->image->delete();
        }

        return redirect()->route('admin.shoes-options.index');
    }

    public function show(ShoesOption $shoesOption)
    {
        abort_if(Gate::denies('shoes_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoesOption->load('shoe');

        return view('admin.shoesOptions.show', compact('shoesOption'));
    }

    public function destroy(ShoesOption $shoesOption)
    {
        abort_if(Gate::denies('shoes_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoesOption->delete();

        return back();
    }

    public function massDestroy(MassDestroyShoesOptionRequest $request)
    {
        ShoesOption::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('shoes_option_create') && Gate::denies('shoes_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ShoesOption();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
