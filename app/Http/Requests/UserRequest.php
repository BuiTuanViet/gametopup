<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_name' => [
                'required',
                'regex:/^[a-zA-Z0-9\s]{1,15}$/',
                'unique:users'
            ],
            'password' => [
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
                'confirmed'
            ],
            'password_confirmation' => 'required',
            'name' => 'required',
            'phone' => 'required|numeric',
        ];
    }
}
