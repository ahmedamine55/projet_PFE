@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addbBijoux.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.addb-bijouxes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.id') }}
                        </th>
                        <td>
                            {{ $addbBijoux->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.name') }}
                        </th>
                        <td>
                            {{ $addbBijoux->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.type') }}
                        </th>
                        <td>
                            @foreach($addbBijoux->types as $key => $type)
                                <span class="label label-info">{{ $type->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.category') }}
                        </th>
                        <td>
                            @foreach($addbBijoux->categories as $key => $category)
                                <span class="label label-info">{{ $category->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('photo1') }}
                        </th>
                        <td>
                            {{ $addbBijoux->photo1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('photo2') }}
                        </th>
                        <td>
                            {{ $addbBijoux->photo2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('photo3') }}
                        </th>
                        <td>
                            {{ $addbBijoux->photo3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Description') }}
                        </th>
                        <td>
                            {{ $addbBijoux->Description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.bijoutier') }}
                        </th>
                        <td>
                            {{ $addbBijoux->bijoutier->nom ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.currency') }}
                        </th>
                        <td>
                            {{ $addbBijoux->currency->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('prix') }}
                        </th>
                        <td>
                            {{ $addbBijoux->prix }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('quantity') }}
                        </th>
                        <td>
                            {{ $addbBijoux->quantity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addbBijoux.fields.verified') }}
                        </th>
                        <td>
                            {{ $addbBijoux->verified }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.addb-bijouxes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
