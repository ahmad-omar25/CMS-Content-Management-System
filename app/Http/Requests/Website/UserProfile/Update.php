<?php

namespace App\Http\Requests\Website\UserProfile;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:150|unique:users,name,' . $this->input('id'),
            'email' => 'required|email|unique:users,email,' . $this->input('id'),
            'password' => 'nullable|confirmed|min:8',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
