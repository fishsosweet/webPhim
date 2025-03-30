<?php

namespace App\Http\Request\User\OTP;

use Illuminate\Foundation\Http\FormRequest;

class OTPRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'otp' => 'required|array|size:6',
        ];
    }
    public function messages(): array{
        return [
            'otp.required'=>'Vui lòng nhập OTP',
            'otp.size'=>'OTP không chính xác',
            'otp.array'=>'OTP không chính xác'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
