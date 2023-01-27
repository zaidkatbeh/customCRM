<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class projectInsert extends FormRequest
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
            'name'=>'required|string|max:255|min:4',
            'users'=>'required',
            'client'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'please enter the project name',
            'name.string'=>'the project name must be a string',
            'name.max:255'=>'the project name must be less than 255',
            'name.min:4'=>'the project name must be more than 4 digits',
            'client'=>'please pick client ',
            'users'=>'please pick one user at least',
        ];
    }
}
