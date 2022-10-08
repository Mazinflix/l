<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWearableOptionRequest;
use App\Http\Requests\StoreWearableOptionRequest;
use App\Http\Requests\UpdateWearableOptionRequest;
use App\Models\Wearable;
use App\Models\WearableOption;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WearableOptionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('wearable_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wearableOptions = WearableOption::with(['wearable', 'media'])->get();

        $wearables = Wearable::get();

        return view('admin.wearableOptions.index', compact('wearableOptions', 'wearables'));
    }

    public function create()
    {
        abort_if(Gate::denies('wearable_option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wearables = Wearable::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.wearableOptions.create', compact('wearables'));
    }

    public function store(StoreWearableOptionRequest $request)
    {
        $wearableOption = WearableOption::create($request->all());

        if ($request->input('image', false)) {
            $wearableOption->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $wearableOption->id]);
        }

        return redirect()->route('admin.wearable-options.index');
    }

    public function edit(WearableOption $wearableOption)
    {
        abort_if(Gate::denies('wearable_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wearables = Wearable::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wearableOption->load('wearable');

        return view('admin.wearableOptions.edit', compact('wearableOption', 'wearables'));
    }

    public function update(UpdateWearableOptionRequest $request, WearableOption $wearableOption)
    {
        $wearableOption->update($request->all());

        if ($request->input('image', false)) {
            if (!$wearableOption->image || $request->input('image') !== $wearableOption->image->file_name) {
                if ($wearableOption->image) {
                    $wearableOption->image->delete();
                }
                $wearableOption->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($wearableOption->image) {
            $wearableOption->image->delete();
        }

        return redirect()->route('admin.wearable-options.index');
    }

    public function show(WearableOption $wearableOption)
    {
        abort_if(Gate::denies('wearable_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wearableOption->load('wearable', 'optionWearableOrders');

        return view('admin.wearableOptions.show', compact('wearableOption'));
    }

    public function destroy(WearableOption $wearableOption)
    {
        abort_if(Gate::denies('wearable_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wearableOption->delete();

        return back();
    }

    public function massDestroy(MassDestroyWearableOptionRequest $request)
    {
        WearableOption::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('wearable_option_create') && Gate::denies('wearable_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new WearableOption();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
