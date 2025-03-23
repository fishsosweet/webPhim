<?php

namespace App\Http\Request\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tenslider'=>'required',
            'anh'=>'required|image',
            'sapxep'=>'required|int|min:1|max:10',
        ];
    }
    public function messages(): array{
        return [
            'tenslider.required'=>'Vui lòng nhập tên slider',
            'anh.required'=>'Vui lòng nhập ảnh',
            'sapxep.required'=>'Vui lòng nhập vị trí',
            'sapxep.min'=>'Nhập tối thiểu từ 1 - 10',
            'sapxep.max'=>'Nhập tối thiểu từ 1 - 10',
        ];
    }
    public function authorize(): bool
    {
        return true;
    }
}
