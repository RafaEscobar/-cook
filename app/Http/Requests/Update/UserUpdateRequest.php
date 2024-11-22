<?php

namespace App\Http\Requests\Request\Update;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'name' => 'required|max:60|min:4',
                'last_name' => 'required|max:200|min:4',
                'date_birth' => 'required|date',
                'email' => 'required|email|max:120',
                'biography' => 'max:300',
                'password' => 'required|max:16|min:8',
            ];
        } else if ($method == 'POST') {
            return [
                'name' => 'sometimes|required|max:60|min:4',
                'last_name' => 'sometimes|required|max:200|min:4',
                'date_birth' => 'sometimes|required|date',
                'email' => 'sometimes|required|email|max:120',
                'biography' => 'sometimes|max:300',
                'password' => 'sometimes|required|max:16|min:8',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Debes agregar un nombre',
            'name.max' => 'El nombre es demasiado grande',
            'name.min' => 'El nombre es muy corto',
            'last_name.required' => 'Debes agregar por lo menos un apellido',
            'last_name.max' => 'El campo de apellidos es muy largo',
            'last_name.min' => 'Agrega un apellido válido',
            'date_birth.required' => 'La fecha de nacimiento es obligatoria',
            'date_birth' => 'La fecha de nacimiento no tiene un formato válido',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' => 'El correo electrónico no tiene un formato válido',
            'email.max' => 'El correo electrónico es muy largo',
            'biography.max' => 'La biografía debe ser más corta',
            'password.required' => 'La contraseña es obligatoria',
            'password.max' => 'La contraseña debe tener máximo 16 caracteres',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres',
        ];
    }
}
