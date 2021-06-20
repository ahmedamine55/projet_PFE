@extends('layouts.admin')
@section('content')
@can('addb_bijoux_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.addb-bijouxes.create') }}">
              {{ trans('add Bijoux') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('Bijoux') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AddbBijoux">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.category') }}
                        </th>
                        <th>
                            {{ trans('Photo1') }}
                        </th>
                        <th>
                            {{ trans('Photo2') }}
                        </th>
                        <th>
                            {{ trans('Photo3') }}
                        </th>
                        <th>
                            {{ trans('global.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.bijoutier') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.prenom') }}
                        </th>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.currency') }}
                        </th>
                        <th>
                            {{ trans('Prix') }}
                        </th>
                        <th>
                            {{ trans('Quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.verified') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addbBijouxes as $key => $addbBijoux)
                        <tr data-entry-id="{{ $addbBijoux->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $addbBijoux->id ?? '' }}
                            </td>
                            <td>
                                {{ $addbBijoux->name ?? '' }}
                            </td>
                            <td>
                                @foreach($addbBijoux->types as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($addbBijoux->categories as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $addbBijoux->photo1 ?? '' }}
                            </td>
                            <td>
                                {{ $addbBijoux->photo2 ?? '' }}
                            </td>
                            <td>
                                {{ $addbBijoux->photo3 ?? '' }}
                            </td>
                            <td>
                                {{ $addbBijoux->description ?? '' }}
                            </td>
                            <td>
                                {{ $addbBijoux->bijoutier->nom ?? '' }}
                            </td>
                            <td>
                                {{ $addbBijoux->bijoutier->prenom ?? '' }}
                            </td>
                            <td>
                                {{ $addbBijoux->currency->name ?? '' }}
                            </td>
                            <td>
                                {{ $addbBijoux->prix ?? '' }}
                            </td>
                            <td>
                                {{ $addbBijoux->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $addbBijoux->verified ?? '' }}
                            </td>
                            <td>
                                @can('addb_bijoux_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.addb-bijouxes.show', $addbBijoux->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('addb_bijoux_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.addb-bijouxes.edit', $addbBijoux->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('addb_bijoux_delete')
                                    <form action="{{ route('admin.addb-bijouxes.destroy', $addbBijoux->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('addb_bijoux_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.addb-bijouxes.massDestroy') }}",
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
  let table = $('.datatable-AddbBijoux:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
