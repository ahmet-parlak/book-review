<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Rules\Password;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class UserCreateRequest extends FormRequest
{
    
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>  ['required', 'string', (new Password)->length(6), 'confirmed'],
            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    public function attributes()
    {
        return [
            'name' => 'isim',
            'email' => 'e-posta',
            'password' => 'şifre',
        ];
    }

   /*  public function messages()
    {
        return [
            'email.required' => 'E-posta gerekli',
            'email.email' => 'E-posta geçersiz',
            'password.required' => 'Şifre gerekli',
            'password.confirmed' => 'Şifre onayı gerekli'
        ];
    } */

    
}
