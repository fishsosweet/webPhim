<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function getThemTheLoai()
    {
        return view('Amin.Categories.add',[
        'title'=>'Thêm thể loại',]
        );
    }
}
