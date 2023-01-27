<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class taskinsert extends FormRequest
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
            'project'=>'required|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'please enter the task name',
            'name.string'=>'the task name must be a string',
            'name.max:255'=>'the task name must be less than 255',
            'name.min:4'=>'the task name must be more than 4 digits',
            'project.required'=>'please pick the project',
            'project.string'=> 'the project most be a string',
        ];
    }
}
