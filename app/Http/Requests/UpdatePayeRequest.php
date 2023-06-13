<?php

namespace App\Http\Requests;

use App\Models\Paye;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePayeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('paye_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
