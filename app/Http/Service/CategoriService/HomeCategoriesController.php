<?php

namespace App\Http\Service\CategoriService;

use App\Http\Controllers\Controller;
use App\Http\Service\MovieService\HomeMovieServiceController;

class HomeCategoriesController extends Controller
{
    protected $homeMovieService;
    public function __construct(HomeMovieServiceController $homeMovieService){
        $this->homeMovieService = $homeMovieService;
    }
    public function renderCategoryView($title, $movies)
    {

        return view('User.Categories.cates', compact('title') + [
                'Phim' => $movies
            ]);
    }
}
