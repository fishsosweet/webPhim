<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\User;

class HomeController extends Controller
{
    public function getHomeAdmin()
    {
        $countMovies = Movie::count();
        $countUsers=User::where('role','user')->count();
        return view('Amin.home',[
            'countMovies' => $countMovies,
                'countUsers' => $countUsers,
            ]
        );
    }
}
