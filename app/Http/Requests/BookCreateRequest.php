<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
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
            'isbn' => 'required|numeric|digits:13|unique:App\Models\Book,isbn',
            'title' => 'required|max:500',
            'author_id' => 'required|exists:App\Models\Author,id',
            'publisher_id' => 'required|exists:App\Models\Publisher,id',
            'publication_year' => 'required|digits:4|integer|min:1000',
            'category_id' => 'required|exists:App\Models\Category,id',
            'pages' => 'nullable|integer',
            'original_title' => 'nullable|min:1',
            'translator' => 'nullable|min:2',
            'description' => 'nullable|max:2000',
            'book_photo' => 'nullable|image|max:1024|mimes:jpg,png,jpeg,svg',
        ];
    }

    public function attributes()
    {
        return [
            'isbn' => 'ISBN',
            'title' => 'Başlık',
            'author_id' => 'Yazar',
            'publisher_id' => 'Yayınevi',
            'publication_year' => 'Yayın Yılı',
            'category_id' => 'Kategori',
            'pages' => 'Sayfa Sayısı',
            'original_title' => 'Orijinal Başlık',
            'translator' => 'Çevirmen',
            'description' => 'Açıklama',
            'book_photo' => 'Kapak Fotoğrafı',
        ];
    }
}
