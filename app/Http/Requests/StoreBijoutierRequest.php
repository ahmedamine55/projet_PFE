<?php

namespace App\Http\Requests;

use App\Models\Bijoutier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBijoutierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bijoutier_create');
    }

    public function rules()
    {
        return [
            'nom'       => [
                'string',
                'required',
            ],
            'prenom'    => [
                'string',
                'required',
            ],
            'mobile'    => [
                'string',
                'required',
                'unique:bijoutiers',
            ],
            'photo1'     => [
                //'photo',
                'nullable',
            ],
            'photo2'     => [
                //'photo',
                'nullable',
            ],
            'photo3'     => [
                //'photo',
                'nullable',
            ],
            'facebook'  => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'twitter'   => [
                'string',
                'nullable',
            ],
            'web'       => [
                'string',
                'nullable',
            ],
            'email'     => [
                'required',
                'unique:bijoutiers',
            ],
            'password'   => [
                'required',
                'string',
            ],
            'paye_id'   => [
                'required',
                'integer',
            ],
          /*  'prix'      => [
                'string',
                'required',
            ],
            'qantity'   => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ], */
        ];
    }
}
