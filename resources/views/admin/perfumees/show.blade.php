@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.perfumee.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.perfumees.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.perfumee.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $perfumee->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.perfumee.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $perfumee->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.perfumee.fields.size') }}
                                    </th>
                                    <td>
                                        {{ $perfumee->size }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.perfumee.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Perfumee::GENDER_RADIO[$perfumee->gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.perfumee.fields.image') }}
                                    </th>
                                    <td>
                                        @if($perfumee->image)
                                            <a href="{{ $perfumee->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $perfumee->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.perfumee.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $perfumee->price }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.perfumees.index') }}">
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
                        <a href="#perfume_perfume_orders" aria-controls="perfume_perfume_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.perfumeOrder.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="perfume_perfume_orders">
                        @includeIf('admin.perfumees.relationships.perfumePerfumeOrders', ['perfumeOrders' => $perfumee->perfumePerfumeOrders])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection