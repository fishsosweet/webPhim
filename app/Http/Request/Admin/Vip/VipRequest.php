<?php

namespace App\Http\Request\Admin\Vip;

use Illuminate\Foundation\Http\FormRequest;

class VipRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tenvip'=>'required',
            'price'=>'required|integer|min:1000',
        ];
    }
    public function messages(): array{
        return [
            'tenvip.required'=>'Vui lòng nhập tên gói Vip',
            'price.min'=>'Nhập tối thiểu từ 1.000 VNĐ',
        ];
    }
    public function authorize(): bool
    {
        return true;
    }
}
