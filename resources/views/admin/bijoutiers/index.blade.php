@extends('layouts.admin')
@section('content')
@can('bijoutier_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.bijoutiers.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bijoutier.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.bijoutier.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Bijoutier">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.nom') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.prenom') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.mobile') }}
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
                            {{ trans('cruds.bijoutier.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.facebook') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.instagram') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.twitter') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.web') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.type_payement') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.paye') }}
                        </th>
                        <th>
                            {{ trans('Password') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bijoutiers as $key => $bijoutier)
                        <tr data-entry-id="{{ $bijoutier->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bijoutier->id ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->nom ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->prenom ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->mobile ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->photo1 ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->photo2 ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->photo3 ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->description ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->facebook ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->instagram ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->twitter ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->web ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->email ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Bijoutier::TYPE_PAYEMENT_SELECT[$bijoutier->type_payement] ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->paye->name ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->password ?? '' }}
                            </td>
                            <!--<td>
                                {{ $bijoutier->prix ?? '' }}
                            </td>
                            <td>
                                {{ $bijoutier->qantity ?? '' }}
                            </td>-->
                            <td>
                                @can('bijoutier_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.bijoutiers.show', $bijoutier->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('bijoutier_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.bijoutiers.edit', $bijoutier->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('bijoutier_delete')
                                    <form action="{{ route('admin.bijoutiers.destroy', $bijoutier->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('bijoutier_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bijoutiers.massDestroy') }}",
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
  let table = $('.datatable-Bijoutier:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
