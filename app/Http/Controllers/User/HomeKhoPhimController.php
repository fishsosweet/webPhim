<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Service\MovieService\HomeMovieServiceController;
use App\Models\Categorie;
use App\Models\Movie;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeKhoPhimController extends Controller
{

    protected $homeMovieService;

    public function __construct(HomeMovieServiceController $homeMovieService)
    {
        $this->homeMovieService = $homeMovieService;
    }

    public function getHomeKhoPhim()
    {
        $user = Auth::guard('web')->user();
        if ($user) {
            if ($user->vip_expiry <= now()) {
                $user->vip_expiry = null;
                $user->vip_status = 0;
                $user->save();
            }
        }
        $cates = $this->homeMovieService->getCates();
        $sliders = $this->homeMovieService->getSlides();
        $phimMoi = $this->homeMovieService->getPhimMoi();
        $phimKinhDi = $this->homeMovieService->getPhimKinhDi();
        $randPhim = $this->homeMovieService->randPhim();
        $phimHoatHinh = $this->homeMovieService->getHoatHinh();
        $phimViewCao = $this->homeMovieService->view();
        return view('User.home', [
            'Categories' => Categorie::all(),
            'Sliders' => $sliders,
            'Cates' => $cates->toArray(),
            'phimMoi' => $phimMoi,
            'phimKinhDi' => $phimKinhDi,
            'phimHoatHinh' => $phimHoatHinh,
            'randomPhim' => $randPhim,
            'view' => $phimViewCao,
        ]);
    }
}
