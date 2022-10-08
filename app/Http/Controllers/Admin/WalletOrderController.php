<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWalletOrderRequest;
use App\Http\Requests\StoreWalletOrderRequest;
use App\Http\Requests\UpdateWalletOrderRequest;
use App\Models\Customer;
use App\Models\Wallet;
use App\Models\WalletOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WalletOrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('wallet_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $walletOrders = WalletOrder::with(['customer', 'wallet'])->get();

        $customers = Customer::get();

        $wallets = Wallet::get();

        return view('admin.walletOrders.index', compact('customers', 'walletOrders', 'wallets'));
    }

    public function create()
    {
        abort_if(Gate::denies('wallet_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wallets = Wallet::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.walletOrders.create', compact('customers', 'wallets'));
    }

    public function store(StoreWalletOrderRequest $request)
    {
        $walletOrder = WalletOrder::create($request->all());
        if($walletOrder){
            $wallet = Wallet::findorfail($walletOrder->wallet_id);
            $wallet->update(['quantity' => $wallet->quantity - $walletOrder->quantity]);
        }

        return redirect()->route('admin.wallet-orders.index');
    }

    public function edit(WalletOrder $walletOrder)
    {
        abort_if(Gate::denies('wallet_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $wallets = Wallet::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $walletOrder->load('customer', 'wallet');

        return view('admin.walletOrders.edit', compact('customers', 'walletOrder', 'wallets'));
    }

    public function update(UpdateWalletOrderRequest $request, WalletOrder $walletOrder)
    {
        $walletOrder->update($request->all());

        return redirect()->route('admin.wallet-orders.index');
    }

    public function show(WalletOrder $walletOrder)
    {
        abort_if(Gate::denies('wallet_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $walletOrder->load('customer', 'wallet');

        return view('admin.walletOrders.show', compact('walletOrder'));
    }

    public function destroy(WalletOrder $walletOrder)
    {
        abort_if(Gate::denies('wallet_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $walletOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyWalletOrderRequest $request)
    {
        WalletOrder::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
