<?php

namespace App\Http\Requests\Article;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        if ($this->expectsJson()) {
            throw new HttpResponseException(response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422));
        }

        parent::failedValidation($validator);
    }

}
