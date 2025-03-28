<?php

namespace App\Http\Controllers\User\Movies;

use App\Http\Controllers\Controller;
use App\Http\Service\MovieService\HomeMovieServiceController;
use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesUserController extends Controller
{
    protected $moviesService;


    public function __construct(HomeMovieServiceController $homeMovieServiceController)
    {
        $this->moviesService = $homeMovieServiceController;
    }
    public function getPhim($id)
    {
        $movie=Movie::find($id);
        $movie->increment('views');
        return $this->moviesService->renderMovieView($movie);
    }
}
