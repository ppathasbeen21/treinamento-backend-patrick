<?php

namespace Agenciafmd\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    protected $errorBag = 'admix';

    public function rules()
    {
        return [
            'is_active' => [
                'required',
                'boolean',
            ],
            'star' => [
                'sometimes',
                'required',
                'boolean',
            ],
            'name' => [
                'required',
                'max:150',
            ],
            'description' => [
                'required',
            ],
            'media' => [
                'array',
                'nullable',
            ],
            'sort' => [
                'nullable',
            ],
        ];
    }

    public function attributes()
    {
        return [
            'is_active' => 'ativo',
            'star' => 'destaque',
            'name' => 'nome',
            'sort' => 'ordenação',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
