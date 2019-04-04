<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'phone' => 'required|min:10|max:11',
            'password' =>'min:6',
            'passwordAgain' => 'same:password',
            'email' => 'required'
            
        ];
    }
    public function messages()
    {
        return [
            'phone.required' => 'We need to know your phone!',
            'password.min' => 'password have to less than 6',
            'passwordAgain.same' => 'passwordAgain not as password',
            'email.required ' => "We need to know your e-mail address!"
        ];
    }
}
