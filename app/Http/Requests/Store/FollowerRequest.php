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
            'follower_id' => 'required|integer',
            'followed_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'follower_id.required' => 'El seguidor es requerido.',
            'follower_id.integer' => 'Formato de seguidor incorrecto.',
            'followed_id.required' => 'El usuario seguido es requerido.',
            'followed_id.integer' => 'Formato de usuario seguido incorrecto.'
        ];
    }
}
