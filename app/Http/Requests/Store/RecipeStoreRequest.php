<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class RecipeStoreRequest extends FormRequest
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
            'title' => 'required|string|max:100|min:4',
            'description' => 'required|max:210',
            'user_id' => 'required|integer',
            'recipe_category_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El nombre de la receta es obligatorio.',
            'title.string' => 'El nombre de la receta es debe ser alfanumérico.',
            'title.max' => 'El nombre de la receta es debe ser más corto.',
            'title.min' => 'El nombre de la receta es muy corto.',
            'description' => 'La descripción de la receta es obligatoria.',
            'description' => 'La descripción de la receta debe ser más corta.',
            'user_id.required' => 'El usuario es obligatorio.',
            'user_id.integer' => 'Formato de usuario inválido.',
            'recipe_category_id.required' => 'La categoría es obligatoria.',
            'recipe_category_id.integer' => 'Formato de receta inválido.'
        ];
    }
}
