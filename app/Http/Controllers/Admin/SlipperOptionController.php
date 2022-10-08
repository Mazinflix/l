<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySlipperOptionRequest;
use App\Http\Requests\StoreSlipperOptionRequest;
use App\Http\Requests\UpdateSlipperOptionRequest;
use App\Models\Slipper;
use App\Models\SlipperOption;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SlipperOptionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('slipper_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slipperOptions = SlipperOption::with(['slipper', 'media'])->get();

        $slippers = Slipper::get();

        return view('admin.slipperOptions.index', compact('slipperOptions', 'slippers'));
    }

    public function create()
    {
        abort_if(Gate::denies('slipper_option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slippers = Slipper::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.slipperOptions.create', compact('slippers'));
    }

    public function store(StoreSlipperOptionRequest $request)
    {
        $slipperOption = SlipperOption::create($request->all());

        if ($request->input('image', false)) {
            $slipperOption->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $slipperOption->id]);
        }

        return redirect()->route('admin.slipper-options.index');
    }

    public function edit(SlipperOption $slipperOption)
    {
        abort_if(Gate::denies('slipper_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slippers = Slipper::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $slipperOption->load('slipper');

        return view('admin.slipperOptions.edit', compact('slipperOption', 'slippers'));
    }

    public function update(UpdateSlipperOptionRequest $request, SlipperOption $slipperOption)
    {
        $slipperOption->update($request->all());

        if ($request->input('image', false)) {
            if (!$slipperOption->image || $request->input('image') !== $slipperOption->image->file_name) {
                if ($slipperOption->image) {
                    $slipperOption->image->delete();
                }
                $slipperOption->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($slipperOption->image) {
            $slipperOption->image->delete();
        }

        return redirect()->route('admin.slipper-options.index');
    }

    public function show(SlipperOption $slipperOption)
    {
        abort_if(Gate::denies('slipper_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slipperOption->load('slipper', 'optionSlipperOrders');

        return view('admin.slipperOptions.show', compact('slipperOption'));
    }

    public function destroy(SlipperOption $slipperOption)
    {
        abort_if(Gate::denies('slipper_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slipperOption->delete();

        return back();
    }

    public function massDestroy(MassDestroySlipperOptionRequest $request)
    {
        SlipperOption::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('slipper_option_create') && Gate::denies('slipper_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SlipperOption();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
