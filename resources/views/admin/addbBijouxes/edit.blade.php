@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
         {{ trans('add Bijoux') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.addb-bijouxes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.addbBijoux.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addbBijoux.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="types">{{ trans('cruds.addbBijoux.fields.type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('types') ? 'is-invalid' : '' }}" name="types[]" id="types" multiple required>
                    @foreach($types as $id => $type)
                        <option value="{{ $id }}" {{ in_array($id, old('types', [])) ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @if($errors->has('types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addbBijoux.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="categories">{{ trans('cruds.addbBijoux.fields.category') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addbBijoux.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="form-label" for="photo1">choose a photo</label>
                <input type="file" class="form-control" name="photo1" id="photo1" />
            </div>
            <div class="form-group">
                <label class="form-label" for="photo2">choose a photo</label>
                <input type="file" class="form-control" name="photo2" id="photo2" />
            </div>
            <div class="form-group">
                <label class="form-label" for="photo3">choose a photo</label>
                <input type="file" class="form-control" name="photo3" id="photo3" />
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.bijoutier.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bijoutier_id">{{ trans('cruds.addbBijoux.fields.bijoutier') }}</label>
                <select class="form-control select2 {{ $errors->has('bijoutier') ? 'is-invalid' : '' }}" name="bijoutier_id" id="bijoutier_id" required>
                    @foreach($bijoutiers as $id => $bijoutier)
                        <option value="{{ $id }}" {{ old('bijoutier_id') == $id ? 'selected' : '' }}>{{ $bijoutier }}</option>
                    @endforeach
                </select>
                @if($errors->has('bijoutier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bijoutier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addbBijoux.fields.bijoutier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="currency_id">{{ trans('cruds.addbBijoux.fields.currency') }}</label>
                <select class="form-control select2 {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency_id" id="currency_id" required>
                    @foreach($currencies as $id => $currency)
                        <option value="{{ $id }}" {{ old('currency_id') == $id ? 'selected' : '' }}>{{ $currency }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addbBijoux.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="Prix">{{ trans('Prix') }}</label>
                <input class="form-control {{ $errors->has('Prix') ? 'is-invalid' : '' }}" type="text" name="Prix" id="Prix" value="{{ old('Prix', '') }}" required>
                @if($errors->has('Prix'))
                    <div class="invalid-feedback">
                        {{ $errors->first('Prix') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addbBijoux.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="Quantiity">{{ trans('Quantiity') }}</label>
                <input class="form-control {{ $errors->has('Quantiity') ? 'is-invalid' : '' }}" type="text" name="Quantiity" id="Quantiity" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
