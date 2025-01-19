<?php

namespace App\Http\Requests\V1\Movement;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'search' => [
                'nullable', // O campo é opcional
                'string',   // Deve ser uma string
                'max:255',  // Tamanho máximo de 255 caracteres
            ],
        ];
    }
}
