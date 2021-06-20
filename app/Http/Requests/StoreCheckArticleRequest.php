<?php

namespace App\Http\Requests;

use App\Models\CheckArticle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCheckArticleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('check_article_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
