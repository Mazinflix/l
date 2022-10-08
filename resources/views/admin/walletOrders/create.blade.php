@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.walletOrder.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.wallet-orders.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('customer') ? 'has-error' : '' }}">
                            <label for="customer_id">{{ trans('cruds.walletOrder.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id">
                                @foreach($customers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <span class="help-block" role="alert">{{ $errors->first('customer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.walletOrder.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('wallet') ? 'has-error' : '' }}">
                            <label class="required" for="wallet_id">{{ trans('cruds.walletOrder.fields.wallet') }}</label>
                            <select class="form-control select2" name="wallet_id" id="wallet_id" required>
                                @foreach($wallets as $id => $entry)
                                    <option value="{{ $id }}" {{ old('wallet_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('wallet'))
                                <span class="help-block" role="alert">{{ $errors->first('wallet') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.walletOrder.fields.wallet_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label class="required" for="quantity">{{ trans('cruds.walletOrder.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', '1') }}" step="1" required>
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.walletOrder.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label for="price">{{ trans('cruds.walletOrder.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01">
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.walletOrder.fields.price_helper') }}</span>
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