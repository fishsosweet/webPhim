<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\TotalVip;
use App\Models\User;

class HomeController extends Controller
{
    public function getHomeAdmin()
    {
        $countMovies = Movie::count();
        $countUsers=User::where('role','user')->count();
        $countVip=User::where('vip_status','1')->count();
        $total = TotalVip::sum('so_tien');
        return view('Amin.home',[
            'countMovies' => $countMovies,
                'countUsers' => $countUsers,
                'countVip' => $countVip,
                'total' => $total
            ]
        );
    }
}
