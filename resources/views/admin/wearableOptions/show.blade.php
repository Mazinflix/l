@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.wearableOption.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.wearable-options.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $wearableOption->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.wearable') }}
                                    </th>
                                    <td>
                                        {{ $wearableOption->wearable->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.option') }}
                                    </th>
                                    <td>
                                        {{ $wearableOption->option }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $wearableOption->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.image') }}
                                    </th>
                                    <td>
                                        @if($wearableOption->image)
                                            <a href="{{ $wearableOption->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $wearableOption->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $wearableOption->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.notes') }}
                                    </th>
                                    <td>
                                        {{ $wearableOption->notes }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.wearable-options.index') }}">
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
                        <a href="#option_wearable_orders" aria-controls="option_wearable_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.wearableOrder.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="option_wearable_orders">
                        @includeIf('admin.wearableOptions.relationships.optionWearableOrders', ['wearableOrders' => $wearableOption->optionWearableOrders])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection