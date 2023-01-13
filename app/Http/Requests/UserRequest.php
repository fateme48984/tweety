<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:255','alpha_dash','unique:users,username,'.$this->user->id.',id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$this->user->id.',id'],
            'password' => ['sometimes','nullable','string','min:8', 'confirmed'],
            'avatar' => 'file|mimetypes:image/jpg,image/jpeg,image'
        ];
    }
}
