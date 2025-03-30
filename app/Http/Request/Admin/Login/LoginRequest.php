<?php

namespace App\Http\Request\Admin\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages(){
        return [
            'email.required'=>'Vui lòng nhập email hihi!',
            'email.email'=>'Sai định dạng email!',
            'password.required'=>'Vui lòng nhập mật khẩu',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
