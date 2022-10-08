<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPerfumeOrderRequest;
use App\Http\Requests\StorePerfumeOrderRequest;
use App\Http\Requests\UpdatePerfumeOrderRequest;
use App\Models\Customer;
use App\Models\Perfumee;
use App\Models\PerfumeOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PerfumeOrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perfume_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perfumeOrders = PerfumeOrder::with(['customer', 'perfume'])->get();

        $customers = Customer::get();

        $perfumees = Perfumee::get();

        return view('admin.perfumeOrders.index', compact('customers', 'perfumeOrders', 'perfumees'));
    }

    public function create()
    {
        abort_if(Gate::denies('perfume_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $perfumes = Perfumee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.perfumeOrders.create', compact('customers', 'perfumes'));
    }

    public function store(StorePerfumeOrderRequest $request)
    {
        $perfumeOrder = PerfumeOrder::create($request->all());
        if($perfumeOrder){
            $wallet = Perfumee::findorfail($perfumeOrder->wallet_id);
            $wallet->update(['quantity' => $wallet->quantity - $perfumeOrder->quantity]);
        }

        return redirect()->route('admin.perfume-orders.index');
    }

    public function edit(PerfumeOrder $perfumeOrder)
    {
        abort_if(Gate::denies('perfume_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $perfumes = Perfumee::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $perfumeOrder->load('customer', 'perfume');

        return view('admin.perfumeOrders.edit', compact('customers', 'perfumeOrder', 'perfumes'));
    }

    public function update(UpdatePerfumeOrderRequest $request, PerfumeOrder $perfumeOrder)
    {
        $perfumeOrder->update($request->all());

        return redirect()->route('admin.perfume-orders.index');
    }

    public function show(PerfumeOrder $perfumeOrder)
    {
        abort_if(Gate::denies('perfume_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perfumeOrder->load('customer', 'perfume');

        return view('admin.perfumeOrders.show', compact('perfumeOrder'));
    }

    public function destroy(PerfumeOrder $perfumeOrder)
    {
        abort_if(Gate::denies('perfume_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perfumeOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyPerfumeOrderRequest $request)
    {
        PerfumeOrder::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
