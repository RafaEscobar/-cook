<?php

namespace App\Http\Requests\Request\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'email' => 'required|email|max:120',
            'password' => 'required|max:16|min:8|password',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico no tiene un formato válido',
            'email.max' => 'El correo electrónico es muy largo',
            'password.required' => 'La contraseña es obligatoria',
            'password.max' => 'La contraseña debe tener máximo 16 caracteres',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres',
            'password.password' => 'La contraseña no tiene un formato válido',
        ];
    }
}
