@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bijoutier.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bijoutiers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.id') }}
                        </th>
                        <td>
                            {{ $bijoutier->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.nom') }}
                        </th>
                        <td>
                            {{ $bijoutier->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.prenom') }}
                        </th>
                        <td>
                            {{ $bijoutier->prenom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.mobile') }}
                        </th>
                        <td>
                            {{ $bijoutier->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('photo1') }}
                        </th>
                        <td>
                            {{ $bijoutier->photo1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('photo2') }}
                        </th>
                        <td>
                            {{ $bijoutier->photo2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('photo3') }}
                        </th>
                        <td>
                            {{ $bijoutier->photo3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.description') }}
                        </th>
                        <td>
                            {{ $bijoutier->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.facebook') }}
                        </th>
                        <td>
                            {{ $bijoutier->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.instagram') }}
                        </th>
                        <td>
                            {{ $bijoutier->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.twitter') }}
                        </th>
                        <td>
                            {{ $bijoutier->twitter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.web') }}
                        </th>
                        <td>
                            {{ $bijoutier->web }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.email') }}
                        </th>
                        <td>
                            {{ $bijoutier->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.type_payement') }}
                        </th>
                        <td>
                            {{ App\Models\Bijoutier::TYPE_PAYEMENT_SELECT[$bijoutier->type_payement] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.paye') }}
                        </th>
                        <td>
                            {{ $bijoutier->paye->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('Password') }}
                        </th>
                        <td>
                            {{ $bijoutier->password }}
                        </td>
                    </tr>
                    <!--<tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.prix') }}
                        </th>
                        <td>
                            {{ $bijoutier->prix }}
                        </td>
                    </tr>-->
                    <!-- <tr>
                        <th>
                            {{ trans('cruds.bijoutier.fields.qantity') }}
                        </th>
                        <td>
                            {{ $bijoutier->qantity }}
                        </td>
                    </tr> -->
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bijoutiers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
