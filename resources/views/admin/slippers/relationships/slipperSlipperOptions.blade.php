<div class="content">
    @can('slipper_option_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.slipper-options.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.slipperOption.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.slipperOption.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-slipperSlipperOptions">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.slipper') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.option') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOption.fields.price') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slipperOptions as $key => $slipperOption)
                                    <tr data-entry-id="{{ $slipperOption->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $slipperOption->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slipperOption->slipper->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slipperOption->option ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slipperOption->quantity ?? '' }}
                                        </td>
                                        <td>
                                            @if($slipperOption->image)
                                                <a href="{{ $slipperOption->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $slipperOption->image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $slipperOption->price ?? '' }}
                                        </td>
                                        <td>
                                            @can('slipper_option_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.slipper-options.show', $slipperOption->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('slipper_option_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.slipper-options.edit', $slipperOption->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('slipper_option_delete')
                                                <form action="{{ route('admin.slipper-options.destroy', $slipperOption->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('slipper_option_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.slipper-options.massDestroy') }}",
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
  let table = $('.datatable-slipperSlipperOptions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection