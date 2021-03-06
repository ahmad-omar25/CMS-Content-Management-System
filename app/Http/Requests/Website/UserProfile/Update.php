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
            'mobile' => 'nullable|numeric|min:11|unique:users,mobile,' . $this->input('id'),
            'user_image' => 'nullable|image|max:2000|mimes:jpg,jpeg,png',
            'bio' => 'nullable|max:100',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
