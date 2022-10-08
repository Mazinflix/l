<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWearableOrderRequest;
use App\Http\Requests\StoreWearableOrderRequest;
use App\Http\Requests\UpdateWearableOrderRequest;
use App\Models\Customer;
use App\Models\Wearable;
use App\Models\WearableOption;
use App\Models\WearableOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WearableOrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('wearable_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wearableOrders = WearableOrder::with(['customer', 'wearable', 'option'])->get();

        $customers = Customer::get();

        $wearables = Wearable::get();

        $wearable_options = WearableOption::get();

        return view('admin.wearableOrders.index', compact('customers', 'wearableOrders', 'wearable_options', 'wearables'));
    }

    public function create()
    {
        abort_if(Gate::denies('wearable_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wearables = Wearable::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $options = WearableOption::pluck('option', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.wearableOrders.create', compact('customers', 'options', 'wearables'));
    }

    public function store(StoreWearableOrderRequest $request)
    {
        $wearableOrder = WearableOrder::create($request->all());

        if($wearableOrder){
            $option = WearableOption::findorfail($wearableOrder->option_id);
            $option->update(['quantity' => $option->quantity - $wearableOrder->quantity]);
        }

        return redirect()->route('admin.wearable-orders.index');
    }

    public function edit(WearableOrder $wearableOrder)
    {
        abort_if(Gate::denies('wearable_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wearables = Wearable::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $options = WearableOption::pluck('option', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wearableOrder->load('customer', 'wearable', 'option');

        return view('admin.wearableOrders.edit', compact('customers', 'options', 'wearableOrder', 'wearables'));
    }

    public function update(UpdateWearableOrderRequest $request, WearableOrder $wearableOrder)
    {
        $wearableOrder->update($request->all());

        return redirect()->route('admin.wearable-orders.index');
    }

    public function show(WearableOrder $wearableOrder)
    {
        abort_if(Gate::denies('wearable_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wearableOrder->load('customer', 'wearable', 'option');

        return view('admin.wearableOrders.show', compact('wearableOrder'));
    }

    public function destroy(WearableOrder $wearableOrder)
    {
        abort_if(Gate::denies('wearable_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wearableOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyWearableOrderRequest $request)
    {
        WearableOrder::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
