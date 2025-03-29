<?php

namespace App\Http\Service\MovieService;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Movie;
use App\Models\Slider;
use Carbon\Carbon;

class HomeMovieServiceController extends Controller
{


    public function view(){
        return Movie::orderBy('views', 'desc')->limit(10)->get();
    }
    public function randPhim()
    {
        return Movie::inRandomOrder()->where('active','1')->limit(12)->get();
    }
    public function getPhimKinhDi()
    {
        return Movie::where('created_at', '>=', Carbon::now()->subDays(7))->where('active','1')
            ->whereHas('category', function ($query) {
                $query->where('name', 'Kinh dị');
            })
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
    }

    public function getPhimMoi()
    {
        return Movie::where('created_at', '>=', Carbon::now()->subDays(7))->where('active','1')->limit(3)->get();
    }

    public function getHoatHinh(){
        return Movie::where('created_at', '>=', Carbon::now()->subDays(7))->where('active','1')
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


    public function renderMovieView($movies,$cmts)
    {
        $movies->load('category');
        $relatedMovies = Movie::whereHas('category', function ($query) use ($movies) {
            $query->whereIn('category_id', $movies->category->pluck('id'));
        })->where('id', '!=', $movies)->limit(6)->get();
        $randMovies = $this->randPhim();
        return view('User.Movies.movies', [
            'randMovies' => $randMovies,
            'Phim' => $movies,
            'belongTo'=>$relatedMovies,
            'cmts' => $cmts
        ]);
    }
}
