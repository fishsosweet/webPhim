<?php

namespace App\Http\Request\Admin\Movie;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tenphim' => 'required',
            'mota' => 'required',
            'namxuatban' => 'required|integer|min:1900|max:2100',
            'thoiluong' => 'required|integer|min:30|max:500',
            'anh'=>'required|image',
            'phim'=>'required',
            'theloai' => 'required|array',
        ];
    }

    public function messages(): array{
        return [
            'tenphim.required'=>'Vui lòng nhập tên phim',
            'mota.required'=>'Vui lòng nhập mô tả',
            'namxuatban.required'=>'Vui lòng nhập năm xuất bản',
            'namxuatban.min'=>'Nhập tối thiểu từ năm 1900 - 2100',
            'namxuatban.max'=>'Nhập tối thiểu từ năm 1900 - 2100',
            'thoiluong.required'=>'Vui lòng nhập thời lượng phim',
            'thoiluong.min'=>'Nhập tối thiểu từ 30 - 500 phút',
            'thoiluong.max'=>'Nhập tối thiểu từ 30 - 500 phút',
            'anh.required'=>'Vui lòng nhập ảnh',
            'phim.required'=>'Vui lòng link phim',
            'theloai.required'=>'Vui lòng chọn thể loại',
        ];
    }
    public function authorize(): bool
    {
        return true;
    }
}
