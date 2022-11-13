<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherUpdateRequest extends FormRequest
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
            'publisher_name' => 'required|max:200',
            'description' => 'max:1000',
            'website' => 'url|nullable',
        ];
    }

    public function attributes()
    {
        return [
            'publisher_name' => 'Yayınevi',
            'description' => 'Açıklama',
            'website' => 'Website',
        ];
    }
}
