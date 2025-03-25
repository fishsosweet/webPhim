<?php

namespace App\Http\Controllers\User\Categories;

use App\Http\Controllers\Controller;
use App\Http\Service\MovieService\HomeMovieServiceController;
use App\Models\Categorie;
use App\Models\Movie;

class CategoriesUserController extends Controller
{
    protected $homeMovieService;

    public function __construct(HomeMovieServiceController $homeMovieService){
        $this->homeMovieService = $homeMovieService;
    }
    public function getTheLoai($id)
    {
        $cates=$this->homeMovieService->getCates();
        $nameCates=$cates->where('id',$id)->first();
        $sliders = $this->homeMovieService->getSlides();
        $movie=Movie::whereHas('category', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();
        return view('User.Categories.cates',[
            'title'=>$nameCates->name,
            'Sliders' => $sliders,
            'Categories'=>$cates,
            'Phim'=>$movie
        ]);

    }
}
