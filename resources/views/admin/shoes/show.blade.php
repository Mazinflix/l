@extends('layouts.soft')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.shoe.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.shoes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shoe.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $shoe->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shoe.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $shoe->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shoe.fields.country') }}
                                    </th>
                                    <td>
                                        {{ $shoe->country }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shoe.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Shoe::TYPE_SELECT[$shoe->type] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.shoes.index') }}">
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
                        <a href="#shoe_shoes_options" aria-controls="shoe_shoes_options" role="tab" data-toggle="tab">
                            {{ trans('cruds.shoesOption.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#shoe_orders" aria-controls="shoe_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.order.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="shoe_shoes_options">
                        @includeIf('admin.shoes.relationships.shoeShoesOptions', ['shoesOptions' => $shoe->shoeShoesOptions])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="shoe_orders">
                        @includeIf('admin.shoes.relationships.shoeOrders', ['orders' => $shoe->shoeOrders])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection