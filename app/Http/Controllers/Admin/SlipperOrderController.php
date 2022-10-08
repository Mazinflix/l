<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySlipperOrderRequest;
use App\Http\Requests\StoreSlipperOrderRequest;
use App\Http\Requests\UpdateSlipperOrderRequest;
use App\Models\Customer;
use App\Models\Slipper;
use App\Models\SlipperOption;
use App\Models\SlipperOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SlipperOrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('slipper_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slipperOrders = SlipperOrder::with(['customer', 'slipper', 'option'])->get();

        $customers = Customer::get();

        $slippers = Slipper::get();

        $slipper_options = SlipperOption::get();

        return view('admin.slipperOrders.index', compact('customers', 'slipperOrders', 'slipper_options', 'slippers'));
    }

    public function create()
    {
        abort_if(Gate::denies('slipper_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $slippers = Slipper::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $options = SlipperOption::pluck('option', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.slipperOrders.create', compact('customers', 'options', 'slippers'));
    }

    public function store(StoreSlipperOrderRequest $request)
    {
        $slipperOrder = SlipperOrder::create($request->all());
        if($slipperOrder){
            $option = SlipperOption::findorfail($slipperOrder->option_id);
            $option->update(['quantity' => $option->quantity - $slipperOrder->quantity]);
        }

        return redirect()->route('admin.slipper-orders.index');
    }

    public function edit(SlipperOrder $slipperOrder)
    {
        abort_if(Gate::denies('slipper_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $slippers = Slipper::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $options = SlipperOption::pluck('option', 'id')->prepend(trans('global.pleaseSelect'), '');

        $slipperOrder->load('customer', 'slipper', 'option');

        return view('admin.slipperOrders.edit', compact('customers', 'options', 'slipperOrder', 'slippers'));
    }

    public function update(UpdateSlipperOrderRequest $request, SlipperOrder $slipperOrder)
    {
        $slipperOrder->update($request->all());

        return redirect()->route('admin.slipper-orders.index');
    }

    public function show(SlipperOrder $slipperOrder)
    {
        abort_if(Gate::denies('slipper_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slipperOrder->load('customer', 'slipper', 'option');

        return view('admin.slipperOrders.show', compact('slipperOrder'));
    }

    public function destroy(SlipperOrder $slipperOrder)
    {
        abort_if(Gate::denies('slipper_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slipperOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroySlipperOrderRequest $request)
    {
        SlipperOrder::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
