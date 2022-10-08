@extends('layouts.soft')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.shoesOption.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.shoes-options.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $shoesOption->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.shoe') }}
                                    </th>
                                    <td>
                                        {{ $shoesOption->shoe->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.option') }}
                                    </th>
                                    <td>
                                        {{ $shoesOption->option }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ShoesOption::GENDER_RADIO[$shoesOption->gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $shoesOption->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $shoesOption->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.image') }}
                                    </th>
                                    <td>
                                        @if($shoesOption->image)
                                            <a href="{{ $shoesOption->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $shoesOption->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.shoes-options.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection