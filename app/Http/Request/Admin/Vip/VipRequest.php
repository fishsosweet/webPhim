<?php

namespace App\Http\Request\Admin\Vip;

use Illuminate\Foundation\Http\FormRequest;

class VipRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tenvip'=>'required',
        ];
    }
    public function messages(): array{
        return [
            'tenvip.required'=>'Vui lòng nhập tên gói Vip',

        ];
    }
    public function authorize(): bool
    {
        return true;
    }
}
