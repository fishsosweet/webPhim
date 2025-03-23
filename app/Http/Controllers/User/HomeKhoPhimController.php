<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class HomeKhoPhimController extends Controller
{
    public function getHomeKhoPhim()
    {
        return view('User.home');

    }
}
