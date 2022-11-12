<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'role_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'full_name.required' => 'Full Name is required!',
            'email.required' => 'Email is required!',
            'role_id.required' => 'Please select at least one role!'
        ];
    }
}
