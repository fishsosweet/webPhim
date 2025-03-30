<?php

namespace App\Http\Request\User\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'emailregi' => 'required|email',
            'passwordregi' => 'required',
            'rePassword' => 'required|same:passwordregi',
        ];
    }
     public function messages(): array{
        return [
            'emailregi.required'=>'Vui lòng nhập email!',
            'emailregi.email'=>'Sai định dạng email!',
            'passwordregi.required'=>'Vui lòng nhập mật khẩu',
            'rePassword.required'=>'Vui lòng xác nhận mật khẩu',
            'rePassword.same'=>'Nhập sai mật khẩu'
        ];
     }
    public function authorize(): bool
    {
        return true;
    }
}
