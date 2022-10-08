@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.wearable.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.wearables.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wearable.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $wearable->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wearable.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $wearable->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wearable.fields.country') }}
                                    </th>
                                    <td>
                                        {{ $wearable->country }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.wearable.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Wearable::TYPE_SELECT[$wearable->type] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.wearables.index') }}">
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
                        <a href="#wearable_wearable_options" aria-controls="wearable_wearable_options" role="tab" data-toggle="tab">
                            {{ trans('cruds.wearableOption.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#wearable_wearable_orders" aria-controls="wearable_wearable_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.wearableOrder.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="wearable_wearable_options">
                        @includeIf('admin.wearables.relationships.wearableWearableOptions', ['wearableOptions' => $wearable->wearableWearableOptions])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="wearable_wearable_orders">
                        @includeIf('admin.wearables.relationships.wearableWearableOrders', ['wearableOrders' => $wearable->wearableWearableOrders])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection