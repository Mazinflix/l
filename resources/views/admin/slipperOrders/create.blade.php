@extends('layouts.soft')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.slipperOrder.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.slipper-orders.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('customer') ? 'has-error' : '' }}">
                            <label class="required" for="customer_id">{{ trans('cruds.slipperOrder.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id" required>
                                @foreach($customers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <span class="help-block" role="alert">{{ $errors->first('customer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slipperOrder.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('slipper') ? 'has-error' : '' }}">
                            <label class="required" for="slipper_id">{{ trans('cruds.slipperOrder.fields.slipper') }}</label>
                            <select class="form-control select2" name="slipper_id" id="slipper_id" required>
                                @foreach($slippers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('slipper_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('slipper'))
                                <span class="help-block" role="alert">{{ $errors->first('slipper') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slipperOrder.fields.slipper_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('option') ? 'has-error' : '' }}">
                            <label class="required" for="option_id">{{ trans('cruds.slipperOrder.fields.option') }}</label>
                            <select class="form-control select2" name="option_id" id="option_id" required>
                                @foreach($options as $id => $entry)
                                    <option value="{{ $id }}" {{ old('option_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('option'))
                                <span class="help-block" role="alert">{{ $errors->first('option') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slipperOrder.fields.option_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label class="required" for="quantity">{{ trans('cruds.slipperOrder.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', '1') }}" step="1" required>
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slipperOrder.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label for="price">{{ trans('cruds.slipperOrder.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01">
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slipperOrder.fields.price_helper') }}</span>
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