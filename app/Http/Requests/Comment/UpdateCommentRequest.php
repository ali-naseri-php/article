<?php

namespace App\Http\Requests\Article;

use App\Models\Comment;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
{
    public function authorize(): bool
    {$comment = Comment::findOrFail($this->route('id'));

        return $comment && $this->user()->can('update', $comment);
    }

    public function rules(): array
    {
        return [
            'content' => 'sometimes|string',
        ];
    }
}
