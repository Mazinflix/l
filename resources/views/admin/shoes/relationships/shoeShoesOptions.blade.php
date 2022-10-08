<div class="content">
    @can('shoes_option_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.shoes-options.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.shoesOption.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.shoesOption.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-shoeShoesOptions">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.shoe') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.option') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.gender') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.shoesOption.fields.image') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shoesOptions as $key => $shoesOption)
                                    <tr data-entry-id="{{ $shoesOption->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $shoesOption->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shoesOption->shoe->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shoesOption->option ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\ShoesOption::GENDER_RADIO[$shoesOption->gender] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shoesOption->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $shoesOption->price ?? '' }}
                                        </td>
                                        <td>
                                            @if($shoesOption->image)
                                                <a href="{{ $shoesOption->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $shoesOption->image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('shoes_option_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.shoes-options.show', $shoesOption->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('shoes_option_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.shoes-options.edit', $shoesOption->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('shoes_option_delete')
                                                <form action="{{ route('admin.shoes-options.destroy', $shoesOption->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('shoes_option_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.shoes-options.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-shoeShoesOptions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection