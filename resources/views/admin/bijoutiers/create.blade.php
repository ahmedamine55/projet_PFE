@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.bijoutier.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bijoutiers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.bijoutier.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', '') }}" required>
                @if($errors->has('nom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="prenom">{{ trans('cruds.bijoutier.fields.prenom') }}</label>
                <input class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}" type="text" name="prenom" id="prenom" value="{{ old('prenom', '') }}" required>
                @if($errors->has('prenom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prenom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.prenom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mobile">{{ trans('cruds.bijoutier.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}" required>
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.mobile_helper') }}</span>
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
                <label for="facebook">{{ trans('cruds.bijoutier.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.bijoutier.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.bijoutier.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="web">{{ trans('cruds.bijoutier.fields.web') }}</label>
                <input class="form-control {{ $errors->has('web') ? 'is-invalid' : '' }}" type="text" name="web" id="web" value="{{ old('web', '') }}">
                @if($errors->has('web'))
                    <div class="invalid-feedback">
                        {{ $errors->first('web') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.web_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.bijoutier.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.bijoutier.fields.type_payement') }}</label>
                <select class="form-control {{ $errors->has('type_payement') ? 'is-invalid' : '' }}" name="type_payement" id="type_payement">
                    <option value disabled {{ old('type_payement', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Bijoutier::TYPE_PAYEMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type_payement', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type_payement'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_payement') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.type_payement_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="paye_id">{{ trans('cruds.bijoutier.fields.paye') }}</label>
                <select class="form-control select2 {{ $errors->has('paye') ? 'is-invalid' : '' }}" name="paye_id" id="paye_id" required>
                    @foreach($payes as $id => $paye)
                        <option value="{{ $id }}" {{ old('paye_id') == $id ? 'selected' : '' }}>{{ $paye }}</option>
                    @endforeach
                </select>
                @if($errors->has('paye'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paye') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.paye_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('Password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" value="{{ old('password', '') }}" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <!--<span class="help-block">{{ trans('cruds.bijoutier.fields.password_helper') }}</span>-->
            </div>
            <!--<div class="form-group">
                <label class="required" for="prix">{{ trans('cruds.bijoutier.fields.prix') }}</label>
                <input class="form-control {{ $errors->has('prix') ? 'is-invalid' : '' }}" type="text" name="prix" id="prix" value="{{ old('prix', '') }}" required>
                @if($errors->has('prix'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prix') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.prix_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qantity">{{ trans('cruds.bijoutier.fields.qantity') }}</label>
                <input class="form-control {{ $errors->has('qantity') ? 'is-invalid' : '' }}" type="number" name="qantity" id="qantity" value="{{ old('qantity', '') }}" step="1" required>
                @if($errors->has('qantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bijoutier.fields.qantity_helper') }}</span>
            </div>-->
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
