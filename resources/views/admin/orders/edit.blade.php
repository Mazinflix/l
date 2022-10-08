@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name_id">{{ trans('cruds.order.fields.name') }}</label>
                            <select class="form-control select2" name="name_id" id="name_id">
                                @foreach($names as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('name_id') ? old('name_id') : $order->name->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('shoe') ? 'has-error' : '' }}">
                            <label for="shoe_id">{{ trans('cruds.order.fields.shoe') }}</label>
                            <select class="form-control select2" name="shoe_id" id="shoe_id">
                                @foreach($shoes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('shoe_id') ? old('shoe_id') : $order->shoe->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('shoe'))
                                <span class="help-block" role="alert">{{ $errors->first('shoe') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.shoe_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('option') ? 'has-error' : '' }}">
                            <label for="option_id">{{ trans('cruds.order.fields.option') }}</label>
                            <select class="form-control select2" name="option_id" id="option_id">
                                @foreach($options as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('option_id') ? old('option_id') : $order->option->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('option'))
                                <span class="help-block" role="alert">{{ $errors->first('option') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.option_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label for="price">{{ trans('cruds.order.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', $order->price) }}" step="0.01">
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection