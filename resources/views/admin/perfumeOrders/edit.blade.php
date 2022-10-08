@extends('layouts.soft')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.perfumeOrder.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.perfume-orders.update", [$perfumeOrder->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('customer') ? 'has-error' : '' }}">
                            <label class="required" for="customer_id">{{ trans('cruds.perfumeOrder.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id" required>
                                @foreach($customers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $perfumeOrder->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <span class="help-block" role="alert">{{ $errors->first('customer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.perfumeOrder.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('perfume') ? 'has-error' : '' }}">
                            <label class="required" for="perfume_id">{{ trans('cruds.perfumeOrder.fields.perfume') }}</label>
                            <select class="form-control select2" name="perfume_id" id="perfume_id" required>
                                @foreach($perfumes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('perfume_id') ? old('perfume_id') : $perfumeOrder->perfume->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('perfume'))
                                <span class="help-block" role="alert">{{ $errors->first('perfume') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.perfumeOrder.fields.perfume_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label class="required" for="quantity">{{ trans('cruds.perfumeOrder.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $perfumeOrder->quantity) }}" step="1" required>
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.perfumeOrder.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label class="required" for="price">{{ trans('cruds.perfumeOrder.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', $perfumeOrder->price) }}" step="0.01" required>
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.perfumeOrder.fields.price_helper') }}</span>
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