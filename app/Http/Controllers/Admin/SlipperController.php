<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySlipperRequest;
use App\Http\Requests\StoreSlipperRequest;
use App\Http\Requests\UpdateSlipperRequest;
use App\Models\Slipper;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SlipperController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('slipper_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slippers = Slipper::all();

        return view('admin.slippers.index', compact('slippers'));
    }

    public function create()
    {
        abort_if(Gate::denies('slipper_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slippers.create');
    }

    public function store(StoreSlipperRequest $request)
    {
        $slipper = Slipper::create($request->all());

        return redirect()->route('admin.slippers.index');
    }

    public function edit(Slipper $slipper)
    {
        abort_if(Gate::denies('slipper_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.slippers.edit', compact('slipper'));
    }

    public function update(UpdateSlipperRequest $request, Slipper $slipper)
    {
        $slipper->update($request->all());

        return redirect()->route('admin.slippers.index');
    }

    public function show(Slipper $slipper)
    {
        abort_if(Gate::denies('slipper_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slipper->load('slipperSlipperOptions', 'slipperSlipperOrders');

        return view('admin.slippers.show', compact('slipper'));
    }

    public function destroy(Slipper $slipper)
    {
        abort_if(Gate::denies('slipper_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slipper->delete();

        return back();
    }

    public function massDestroy(MassDestroySlipperRequest $request)
    {
        Slipper::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
