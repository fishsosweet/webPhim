<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Service\MovieService\HomeMovieServiceController;
use App\Models\Categorie;
use App\Models\Movie;
use App\Models\Slider;
use Carbon\Carbon;

class HomeKhoPhimController extends Controller
{

    protected $homeMovieService;

    public function __construct(HomeMovieServiceController $homeMovieService){
        $this->homeMovieService = $homeMovieService;
    }
    public function getHomeKhoPhim()
    {
        $cates=$this->homeMovieService->getCates();
        $sliders = $this->homeMovieService->getSlides();
        $phimMoi = $this->homeMovieService->getPhimMoi();
        $phimKinhDi=$this->homeMovieService->getPhimKinhDi();
        $randPhim=$this->homeMovieService->randPhim();
        $phimHoatHinh=$this->homeMovieService->getHoatHinh();
        return view('User.home',[
            'Categories'=>Categorie::all(),
            'Sliders' => $sliders,
            'Cates' => $cates->toArray(),
            'phimMoi' => $phimMoi,
            'phimKinhDi' => $phimKinhDi,
            'phimHoatHinh' => $phimHoatHinh,
            'randomPhim' => $randPhim,
        ]);

    }
}
