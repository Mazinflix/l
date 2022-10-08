@extends('layouts.admin')
@section('content')
<div class="content">
    @can('wearable_option_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.wearable-options.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.wearableOption.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.wearableOption.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-WearableOption">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.wearable') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.option') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.wearableOption.fields.notes') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($wearables as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wearableOptions as $key => $wearableOption)
                                    <tr data-entry-id="{{ $wearableOption->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $wearableOption->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $wearableOption->wearable->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $wearableOption->option ?? '' }}
                                        </td>
                                        <td>
                                            {{ $wearableOption->quantity ?? '' }}
                                        </td>
                                        <td>
                                            @if($wearableOption->image)
                                                <a href="{{ $wearableOption->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $wearableOption->image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $wearableOption->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $wearableOption->notes ?? '' }}
                                        </td>
                                        <td>
                                            @can('wearable_option_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.wearable-options.show', $wearableOption->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('wearable_option_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.wearable-options.edit', $wearableOption->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('wearable_option_delete')
                                                <form action="{{ route('admin.wearable-options.destroy', $wearableOption->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('wearable_option_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.wearable-options.massDestroy') }}",
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
  let table = $('.datatable-WearableOption:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection