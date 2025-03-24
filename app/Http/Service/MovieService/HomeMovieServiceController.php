<?php

namespace App\Http\Service\MovieService;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Movie;
use App\Models\Slider;
use Carbon\Carbon;

class HomeMovieServiceController extends Controller
{
    public function getPhimKinhDi()
    {
        return Movie::where('created_at', '>=', Carbon::now()->subDays(7))
            ->whereHas('category', function ($query) {
                $query->where('name', 'Kinh dị');
            })
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
    }

    public function getPhimMoi()
    {
        return Movie::where('created_at', '>=', Carbon::now()->subDays(7))->limit(3)->get();
    }

    public function getHoatHinh(){
        return Movie::where('created_at', '>=', Carbon::now()->subDays(7))
            ->whereHas('category', function ($query) {
                $query->where('name', 'Hoạt hình');
            })
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
    }

    public function getSlides()
    {
        return Slider::select('thum')->where('active','1')->orderBy('sort', 'asc')->get();
    }

    public function getCates()
    {
        return Categorie::select('id','thum','name')->where('active','1')->get();
    }
}
