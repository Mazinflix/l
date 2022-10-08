@extends('layouts.soft')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.wallet.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.wallets.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wallet.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $wallet->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wallet.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $wallet->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wallet.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Wallet::TYPE_RADIO[$wallet->type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wallet.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $wallet->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wallet.fields.image') }}
                                    </th>
                                    <td>
                                        @if($wallet->image)
                                            <a href="{{ $wallet->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $wallet->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wallet.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $wallet->price }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.wallets.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#wallet_wallet_orders" aria-controls="wallet_wallet_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.walletOrder.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="wallet_wallet_orders">
                        @includeIf('admin.wallets.relationships.walletWalletOrders', ['walletOrders' => $wallet->walletWalletOrders])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection