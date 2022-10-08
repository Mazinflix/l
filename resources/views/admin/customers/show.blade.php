@extends('layouts.soft')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.customer.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.customer.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $customer->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.customer.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $customer->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.customer.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $customer->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.customer.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $customer->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.customer.fields.identification') }}
                                    </th>
                                    <td>
                                        @foreach($customer->identification as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
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
                        <a href="#customer_wearable_orders" aria-controls="customer_wearable_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.wearableOrder.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#customer_slipper_orders" aria-controls="customer_slipper_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.slipperOrder.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#customer_perfume_orders" aria-controls="customer_perfume_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.perfumeOrder.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#customer_wallet_orders" aria-controls="customer_wallet_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.walletOrder.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#name_orders" aria-controls="name_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.order.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="customer_wearable_orders">
                        @includeIf('admin.customers.relationships.customerWearableOrders', ['wearableOrders' => $customer->customerWearableOrders])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="customer_slipper_orders">
                        @includeIf('admin.customers.relationships.customerSlipperOrders', ['slipperOrders' => $customer->customerSlipperOrders])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="customer_perfume_orders">
                        @includeIf('admin.customers.relationships.customerPerfumeOrders', ['perfumeOrders' => $customer->customerPerfumeOrders])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="customer_wallet_orders">
                        @includeIf('admin.customers.relationships.customerWalletOrders', ['walletOrders' => $customer->customerWalletOrders])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="name_orders">
                        @includeIf('admin.customers.relationships.nameOrders', ['orders' => $customer->nameOrders])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection