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
}
