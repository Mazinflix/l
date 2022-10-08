<div class="content">
    @can('slipper_order_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.slipper-orders.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.slipperOrder.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.slipperOrder.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-slipperSlipperOrders">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOrder.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOrder.fields.customer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOrder.fields.slipper') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOrder.fields.option') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOrder.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.slipperOrder.fields.price') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($slipperOrders as $key => $slipperOrder)
                                    <tr data-entry-id="{{ $slipperOrder->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $slipperOrder->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slipperOrder->customer->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slipperOrder->slipper->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slipperOrder->option->option ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slipperOrder->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $slipperOrder->price ?? '' }}
                                        </td>
                                        <td>
                                            @can('slipper_order_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.slipper-orders.show', $slipperOrder->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('slipper_order_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.slipper-orders.edit', $slipperOrder->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('slipper_order_delete')
                                                <form action="{{ route('admin.slipper-orders.destroy', $slipperOrder->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('slipper_order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.slipper-orders.massDestroy') }}",
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
  let table = $('.datatable-slipperSlipperOrders:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection