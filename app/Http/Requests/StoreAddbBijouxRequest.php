<?php

namespace App\Http\Requests;

use App\Models\AddbBijoux;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddbBijouxRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('addb_bijoux_create');
    }

    public function rules()
    {
        return [
            'name'         => [
                'string',
                'required',
            ],
            'types.'      => [
                'integer',
            ],
            'types'        => [
                'required',
                'array',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'required',
                'array',
            ],
            'photo1' =>[
                "nullable"
            ],
            'photo3'     => [
                //'photo',
                'nullable',
            ],
            'photo3'     => [
                //'photo',
                'nullable',
            ],
            'bijoutier_id' => [
                'required',
                'integer',
            ],
            'currency_id'  => [
                'required',
                'integer',
            ],

            'prix'         => [
                'required',
                'string',

            ],
            'quantity'         => [
                'string',

            ],
            'verified'     => [
                'string',
            ],
        ];
    }
}
