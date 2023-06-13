@extends('layouts.admin')
@section('content')
    <div> <a href="{{ route('admin.check-articles.index') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">New articles</a>
        <a href="{{ route('admin.articleViewOld') }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Old article</a>
    </div>
    <br><br>
<div class="card">
    <div class="card-header">
        {{ trans('Old Articles') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CheckArticle">
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
                            {{ trans('cruds.addbBijoux.fields.bijoutier') }}
                        </th>
                        <th>
                            {{ trans('cruds.bijoutier.fields.prenom') }}
                        </th>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.currency') }}
                        </th>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.verified') }}
                        </th>
                        <th>
                            {{ trans('Action') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $key => $article)
                        <tr data-entry-id="{{ $article->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $article->id ?? '' }}
                            </td>
                            <td>
                                {{ $article->name ?? '' }}
                            </td>
                            <td>
                                @foreach($article->types as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($article->categories as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $article->bijoutier->nom ?? '' }}
                            </td>
                            <td>
                                {{ $article->bijoutier->prenom ?? '' }}
                            </td>
                            <td>
                                {{ $article->currency->name ?? '' }}
                            </td>
                            <td>
                                {{ $article->verified ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.changeNew', $article->id) }}">
                                    {{ trans('Cancel') }}
                                </a>
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
@can('check_article_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.check-articles.massDestroy') }}",
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
  let table = $('.datatable-CheckArticle:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection