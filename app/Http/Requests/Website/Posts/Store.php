<?php

namespace App\Http\Requests\Website\Posts;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:120',
            'description' => 'required|max:500',
            'status' => 'required',
            'comment_able' => 'required',
            'category_id' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
