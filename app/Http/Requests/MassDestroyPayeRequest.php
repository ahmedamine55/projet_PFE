<?php

namespace App\Http\Requests;

use App\Models\Paye;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPayeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('paye_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:payes,id',
        ];
    }
}
