@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.orders.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name_id">{{ trans('cruds.order.fields.name') }}</label>
                            <select class="form-control select2" name="name_id" id="name_id">
                                @foreach($names as $id => $entry)
                                    <option value="{{ $id }}" {{ old('name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="shoe_id">{{ trans('cruds.order.fields.shoe') }}</label>
                            <select class="form-control select2 {{ $errors->has('shoe') ? 'is-invalid' : '' }}" name="shoe_id" id="shoe_id">
                                @foreach($shoes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('shoe_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('shoe'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('shoe') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.shoe_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="option_id">{{ trans('cruds.order.fields.option') }}</label>
                            <select class="form-control select2 {{ $errors->has('option') ? 'is-invalid' : '' }}" name="option_id" id="option_id">
                                @foreach($options as $id => $entry)
                                    <option value="{{ $id }}" {{ old('option_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('option'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('option') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.option_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label for="price">{{ trans('cruds.order.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01">
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

@section('scripts')
<script>
            // when country dropdown changes
            $('#shoe_id').change(function() {
            var shoeId = $(this).val();
            if (shoeId) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('shoes_options') }}?shoe_id=" + shoeId,
                    success: function(res) {
                        if (res) {
                            $("#option_id").empty();
                            $("#option_id").append('<option> select options </option>');
                            $.each(res, function(key, value) {
                                $("#option_id").append('<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        } else {
                            $("#option_id").empty();
                        }
                    }
                });
            } else {
            }
        });
</script>
    
@endsection
@endsection


    
