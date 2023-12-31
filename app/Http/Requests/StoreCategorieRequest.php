<?php

namespace App\Http\Requests;

use App\Models\Categorie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCategorieRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('categorie_create');
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
