<?php

namespace App\Http\Request\User\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'rePassword' => 'required|same:password',
        ];
    }
     public function messages(): array{
        return [
            'email.required'=>'Vui lòng nhập email!',
            'email.email'=>'Sai định dạng email!',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'rePassword.required'=>'Vui lòng xác nhận mật khẩu',
            'rePassword.same'=>'Nhập sai mật khẩu'
        ];
     }
    public function authorize(): bool
    {
        return true;
    }
}
