<?php

namespace App\Http\Request\Admin\Categori;

use Illuminate\Foundation\Http\FormRequest;

class CategoriRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tentheloai'=>'required',
            'anh'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array{
        return [
            'tentheloai.required'=>'Vui lòng nhập tên thể loại',
            'anh.required'=>'Vui lòng nhập ảnh'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
