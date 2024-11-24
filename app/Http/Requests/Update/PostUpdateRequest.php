<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
                'title' => 'required|string|max:100|min:4',
                'text' => 'required|string',
                'post_category_id' => 'required|integer'
            ];
        } else if ($method == 'PATCH') {
            return [
                'title' => 'sometimes|required|string|max:100|min:4',
                'text' => 'sometimes|required|string',
                'post_category_id' => 'sometimes|required|integer'
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required' => 'El título del post es obligatorio.',
            'title.string' => 'El título debe ser alfanumérico.',
            'title.max' => 'El título debe ser más corto.',
            'title.min' => 'El título es muy corto.',
            'text.required' => 'El contenido de la entrada es obligatoria',
            'text.string' => 'El contenido debe ser alfanumérico',
            'post_category_id.integer' => 'Formato incorrecto de categoría',
            'post_category_id.required' => 'La categoría es obligatoria',
        ];
    }
}
