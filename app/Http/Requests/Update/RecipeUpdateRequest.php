<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class RecipeUpdateRequest extends FormRequest
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
                'description' => 'required|max:210',
                'user_id' => 'required|integer',
                'recipe_category_id' => 'required|integer'
            ];
        } else if ($method == 'PATCH') {
            return [
                'title' => 'sometimes|required|string|max:100|min:4',
                'description' => 'sometimes|required|max:210',
                'user_id' => 'sometimes|required|integer',
                'recipe_category_id' => 'sometimes|required|integer'
            ];
        }
    }
}
