<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content'    => 'required|string',
            'article_id' => 'required|exists:articles,id',
        ];
    }
}
