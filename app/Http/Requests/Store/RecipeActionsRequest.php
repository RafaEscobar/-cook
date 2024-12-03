<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class RecipeActionsRequest extends FormRequest
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
            'recipe_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'recipe_id.required' => 'La receta es obligatoría.',
            'recipe_id.integer' => 'Formato de la receta incorrecto.'
        ];
    }
}
