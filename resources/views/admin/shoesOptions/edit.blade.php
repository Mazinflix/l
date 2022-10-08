@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.shoesOption.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.shoes-options.update", [$shoesOption->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('shoe') ? 'has-error' : '' }}">
                            <label class="required" for="shoe_id">{{ trans('cruds.shoesOption.fields.shoe') }}</label>
                            <select class="form-control select2" name="shoe_id" id="shoe_id" required>
                                @foreach($shoes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('shoe_id') ? old('shoe_id') : $shoesOption->shoe->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('shoe'))
                                <span class="help-block" role="alert">{{ $errors->first('shoe') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.shoesOption.fields.shoe_helper') }}</span>
                        </div>
                        <div class="picker">
                            <div class="form-group">
                                <label for="color">{{ __('Shoe color') }}</label>
                                <select class="form-control select2 {{ $errors->has('color') ? 'is-invalid' : '' }}" name="color" id="color">
                                    <option value="red">red</option>
                                    <option value="black">black</option>
                                    <option value="blue">blue</option>
                                    <option value="brown">brown</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="size">{{ __('Shoe size') }}</label>
                                <select class="form-control select2 {{ $errors->has('size') ? 'is-invalid' : '' }}" name="size" id="size">
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="43">43</option>
                                    <option value="45">45</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">{{ __('Shoe type') }}</label>
                                <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                                    <option value="high">High</option>
                                    <option value="low">low</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.shoesOption.fields.gender') }}</label>
                            @foreach(App\Models\ShoesOption::GENDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $shoesOption->gender) === (string) $key ? 'checked' : '' }}>
                                    <label for="gender_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('gender'))
                                <span class="help-block" role="alert">{{ $errors->first('gender') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.shoesOption.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label for="quantity">{{ trans('cruds.shoesOption.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $shoesOption->quantity) }}" step="1">
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.shoesOption.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label for="price">{{ trans('cruds.shoesOption.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', $shoesOption->price) }}" step="0.01">
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.shoesOption.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image">{{ trans('cruds.shoesOption.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.shoesOption.fields.image_helper') }}</span>
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
    url: '{{ route('admin.shoes-options.storeMedia') }}',
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
@if(isset($shoesOption) && $shoesOption->image)
      var file = {!! json_encode($shoesOption->image) !!}
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