<div class="content">
    @can('wallet_order_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.wallet-orders.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.walletOrder.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.walletOrder.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-walletWalletOrders">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.walletOrder.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.walletOrder.fields.customer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.walletOrder.fields.wallet') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.walletOrder.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.walletOrder.fields.price') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($walletOrders as $key => $walletOrder)
                                    <tr data-entry-id="{{ $walletOrder->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $walletOrder->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $walletOrder->customer->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $walletOrder->wallet->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $walletOrder->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $walletOrder->price ?? '' }}
                                        </td>
                                        <td>
                                            @can('wallet_order_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.wallet-orders.show', $walletOrder->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('wallet_order_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.wallet-orders.edit', $walletOrder->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('wallet_order_delete')
                                                <form action="{{ route('admin.wallet-orders.destroy', $walletOrder->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('wallet_order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.wallet-orders.massDestroy') }}",
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
  let table = $('.datatable-walletWalletOrders:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection