<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class FollowerRequest extends FormRequest
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
            'followed_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'followed_id.required' => 'El usuario seguido es obligatorio.',
            'followed_id.integer' => 'El formato del usuario seguido es incorrecto.'
        ];
    }
}
