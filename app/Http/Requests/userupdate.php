<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userupdate extends FormRequest
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
            'name'=>'required|string|max:255|min:8',
            'password'=>'required|string|max:255|min:8',
        ];
       
    }
    public function messages()
    {
        return[
        'name.required'=>'please enter the user name',
        'name.string'=>'the user name must be a string',
        'name.max:255'=>'the user name must be less than 255',
        'name.min:8'=>'the user name must be more than 8 digits',
        'password.required'=>'please enter the user password',
        'password.string'=>'the password must be a string',
        'password.max:255'=>'the password must be less than 255',
        'password.min:8'=>'the password must be more than 8 digits',
       ];
    }
}
