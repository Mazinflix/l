@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.slipperOption.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.slipper-options.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('slipper') ? 'has-error' : '' }}">
                            <label class="required" for="slipper_id">{{ trans('cruds.slipperOption.fields.slipper') }}</label>
                            <select class="form-control select2" name="slipper_id" id="slipper_id" required>
                                @foreach($slippers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('slipper_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('slipper'))
                                <span class="help-block" role="alert">{{ $errors->first('slipper') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slipperOption.fields.slipper_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('option') ? 'has-error' : '' }}">
                            <label class="required" for="option">{{ trans('cruds.slipperOption.fields.option') }}</label>
                            <input class="form-control" type="text" name="option" id="option" value="{{ old('option', '') }}" required>
                            @if($errors->has('option'))
                                <span class="help-block" role="alert">{{ $errors->first('option') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slipperOption.fields.option_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label class="required" for="quantity">{{ trans('cruds.slipperOption.fields.quantity') }}</label>
                            <input class="form-control" type="text" name="quantity" id="quantity" value="{{ old('quantity', '') }}" required>
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slipperOption.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image">{{ trans('cruds.slipperOption.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slipperOption.fields.image_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label class="required" for="price">{{ trans('cruds.slipperOption.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slipperOption.fields.price_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.slipper-options.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($slipperOption) && $slipperOption->image)
      var file = {!! json_encode($slipperOption->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection