<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class PostCommentRequest extends FormRequest
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
            'post_id' => 'required|integer',
            'text' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'post_id.required' => 'El post es obligatorio.',
            'post_id.integer' => 'El formato del post es incorrecto.',
            'text.required' => 'El contenido del comentario es necesario.',
        ];
    }
}
