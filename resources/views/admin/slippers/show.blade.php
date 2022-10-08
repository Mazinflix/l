@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.slipper.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.slippers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.slipper.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $slipper->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.slipper.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $slipper->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.slipper.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Slipper::TYPE_SELECT[$slipper->type] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.slippers.index') }}">
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
                        <a href="#slipper_slipper_options" aria-controls="slipper_slipper_options" role="tab" data-toggle="tab">
                            {{ trans('cruds.slipperOption.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#slipper_slipper_orders" aria-controls="slipper_slipper_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.slipperOrder.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="slipper_slipper_options">
                        @includeIf('admin.slippers.relationships.slipperSlipperOptions', ['slipperOptions' => $slipper->slipperSlipperOptions])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="slipper_slipper_orders">
                        @includeIf('admin.slippers.relationships.slipperSlipperOrders', ['slipperOrders' => $slipper->slipperSlipperOrders])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection