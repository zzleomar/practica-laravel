<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUsuario extends FormRequest
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
            'name' => 'max:60|required',
            'username' => 'max:60|required|unique:users',
            'email'  => 'max:60||email|required|unique:users',
            'password' => 'min:4|max:60|required'
        ];
    }
}
