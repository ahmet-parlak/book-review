<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorUpdateRequest extends FormRequest
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
            'author_name' => 'required|max:200|unique:App\Models\Author,author_name,' . $this->route('author'),
            'country' => 'nullable|min:2|max:200',
            'description' => 'max:1000',
            'birth_year' => 'nullable|numeric|min:1000|max:' . date("Y"),
            'death_year' => 'nullable|numeric|min:1000|max:' . date("Y"),
            'title' => 'required|in:author,translator',
            'author_photo' => 'nullable|image|max:1024|mimes:jpg,png,jpeg,svg'
        ];
    }

    public function attributes()
    {
        return [
            'author_name' => 'Yazar İsmi',
            'description' => 'Açıklama',
            'birth_year' => 'Doğum Yılı',
            'death_year' => 'Ölüm Yılı',
            'author_photo' => 'Yazar Fotoğrafı',
            'country' => 'Ülke',
            'title' => 'Unvan'
        ];
    }
}
