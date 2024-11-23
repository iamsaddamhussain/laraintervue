<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->route()->parameter('user'))],
            'password' => 'required|same:confirm_password|min:8',
            'role' => 'nullable|array',
        ];
    }
}
