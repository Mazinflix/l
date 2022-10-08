@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.slipperOption.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.slipper-options.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $slipperOption->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.slipper') }}
                                    </th>
                                    <td>
                                        {{ $slipperOption->slipper->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.option') }}
                                    </th>
                                    <td>
                                        {{ $slipperOption->option }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $slipperOption->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.image') }}
                                    </th>
                                    <td>
                                        @if($slipperOption->image)
                                            <a href="{{ $slipperOption->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $slipperOption->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $slipperOption->price }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.slipper-options.index') }}">
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
                        <a href="#option_slipper_orders" aria-controls="option_slipper_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.slipperOrder.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="option_slipper_orders">
                        @includeIf('admin.slipperOptions.relationships.optionSlipperOrders', ['slipperOrders' => $slipperOption->optionSlipperOrders])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection