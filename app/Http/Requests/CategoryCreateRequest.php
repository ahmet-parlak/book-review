<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'category_name' => 'required|max:200|unique:App\Models\Category,category_name',
            'description' => 'max:1000|nullable',
            'parent_id' => 'nullable|exists:App\Models\Category,id',
        ];
    }

    public function attributes()
    {
        return [
            'category_name' => 'Kategori',
            'description' => 'Açıklama',
            'parent_id' => 'Üst Kategori',
        ];
    }
}
