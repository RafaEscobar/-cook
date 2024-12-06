<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class IngredientRequest extends FormRequest
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
            'name' => 'required|min:2|max:120'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "El nombre del ingrediente es obligatorio.",
            "name.min" => "El nombre del ingrediente es muy corto.",
            "name.max" => "El nombre del ingrediente es muy largo.",
        ];
    }
}
