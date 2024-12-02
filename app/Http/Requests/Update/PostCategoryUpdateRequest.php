<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
                'category' => 'required|max:140'
            ];
        } else if ($method == 'PATCH') {
            return [
                'category' => 'sometimes|required|max:140'
            ];
        }
    }

    public function messages()
    {
        return [
            'category.request' => 'La categoría es obligatoria.',
            'category.max' => 'La categoría es demasiado larga.',
        ];
    }
}
