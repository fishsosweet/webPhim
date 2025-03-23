<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Slider;

class HomeKhoPhimController extends Controller
{
    public function getHomeKhoPhim()
    {
        $cates=Categorie::select('id','thum','name')->where('active','1')->get();
        $sliders = Slider::select('thum')->where('active','1')->orderBy('sort', 'asc')->get();
        return view('User.home',[
            'Sliders' => $sliders,
            'Cates' => $cates->toArray(),
        ]);

    }
}
