<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Shoe;
use App\Models\ShoesOption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::with(['name', 'shoe', 'option'])->get();

        $customers = Customer::get();

        $shoes = Shoe::get();

        $shoes_options = ShoesOption::get();

        return view('admin.orders.index', compact('customers', 'orders', 'shoes', 'shoes_options'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $names = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shoes = Shoe::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $options = ShoesOption::pluck('option', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orders.create', compact('names', 'options', 'shoes'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());

        if($order){
            $option = ShoesOption::findorfail($order->option_id);
            $option->decrement('quantity');
        }

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $names = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shoes = Shoe::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $options = ShoesOption::pluck('option', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order->load('name', 'shoe', 'option');

        return view('admin.orders.edit', compact('names', 'options', 'order', 'shoes'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('name', 'shoe', 'option');

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
