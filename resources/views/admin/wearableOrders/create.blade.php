@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.wearableOrder.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.wearable-orders.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('customer') ? 'has-error' : '' }}">
                            <label for="customer_id">{{ trans('cruds.wearableOrder.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id">
                                @foreach($customers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <span class="help-block" role="alert">{{ $errors->first('customer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.wearableOrder.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('wearable') ? 'has-error' : '' }}">
                            <label class="required" for="wearable_id">{{ trans('cruds.wearableOrder.fields.wearable') }}</label>
                            <select class="form-control select2" name="wearable_id" id="wearable_id" required>
                                @foreach($wearables as $id => $entry)
                                    <option value="{{ $id }}" {{ old('wearable_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('wearable'))
                                <span class="help-block" role="alert">{{ $errors->first('wearable') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.wearableOrder.fields.wearable_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('option') ? 'has-error' : '' }}">
                            <label class="required" for="option_id">{{ trans('cruds.wearableOrder.fields.option') }}</label>
                            <select class="form-control select2" name="option_id" id="option_id" required>
                                @foreach($options as $id => $entry)
                                    <option value="{{ $id }}" {{ old('option_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('option'))
                                <span class="help-block" role="alert">{{ $errors->first('option') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.wearableOrder.fields.option_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label class="required" for="quantity">{{ trans('cruds.wearableOrder.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', '1') }}" step="1" required>
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.wearableOrder.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label class="required" for="price">{{ trans('cruds.wearableOrder.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.wearableOrder.fields.price_helper') }}</span>
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