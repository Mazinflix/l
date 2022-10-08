<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWearableRequest;
use App\Http\Requests\StoreWearableRequest;
use App\Http\Requests\UpdateWearableRequest;
use App\Models\Wearable;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WearableController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('wearable_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wearables = Wearable::all();

        return view('admin.wearables.index', compact('wearables'));
    }

    public function create()
    {
        abort_if(Gate::denies('wearable_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.wearables.create');
    }

    public function store(StoreWearableRequest $request)
    {
        $wearable = Wearable::create($request->all());

        return redirect()->route('admin.wearables.index');
    }

    public function edit(Wearable $wearable)
    {
        abort_if(Gate::denies('wearable_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.wearables.edit', compact('wearable'));
    }

    public function update(UpdateWearableRequest $request, Wearable $wearable)
    {
        $wearable->update($request->all());

        return redirect()->route('admin.wearables.index');
    }

    public function show(Wearable $wearable)
    {
        abort_if(Gate::denies('wearable_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wearable->load('wearableWearableOptions', 'wearableWearableOrders');

        return view('admin.wearables.show', compact('wearable'));
    }

    public function destroy(Wearable $wearable)
    {
        abort_if(Gate::denies('wearable_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wearable->delete();

        return back();
    }

    public function massDestroy(MassDestroyWearableRequest $request)
    {
        Wearable::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
