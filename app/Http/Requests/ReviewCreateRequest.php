<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;


class ReviewCreateRequest extends FormRequest
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
            'book' => 'required|exists:books,id',
            'rating' => 'required|in:1,2,3,4,5',
            'review' => 'nullable|min:3|max:100000',
            
            //user_id and book_id should be unique
            'book' => Rule::unique('reviews','book_id')->where(function ($query){
                return $query->where('user_id', auth()->user()->id);
            })
        ];
    }

    public function messages()
    {
        return[
            'book.unique' => 'Kitap zaten değerlendirilmiş!'
        ];
    }
}
