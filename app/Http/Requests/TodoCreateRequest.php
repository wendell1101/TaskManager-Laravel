<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoCreateRequest extends FormRequest
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
            'title'=>'required|max:255',
            'description'=>'required|max:255',
        ];
    }

    public function messages() {
        return[
            'title.required'=> 'Task title is required',
            'title.max' => 'Task title should not be greater than 255 characters',
            'description.required' => 'Task description is required',
            'description.max' => 'Task description should not be greater than 255 characters',
        ];
    }
}
