<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('recipes', 'title')->ignore($this->route('recipe')),
            ],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
            'ingredients' => ['required', 'string'],
            'instructions' => ['required', 'string'],
            'cooking_time' => ['required', 'integer', 'min:1'],
            'difficulty' => ['required', 'in:easy,medium,hard'],
            'servings' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'in:draft,published'],
        ];
    }
}
