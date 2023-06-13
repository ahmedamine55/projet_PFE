<?php

namespace App\Http\Requests;

use App\Models\AddbBijoux;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddbBijouxRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('addb_bijoux_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:addb_bijouxes,id',
        ];
    }
}
