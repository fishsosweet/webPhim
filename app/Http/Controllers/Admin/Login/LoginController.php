<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Controllers\Controller;
use App\Http\Request\Admin\Login\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view("Amin.Login.login",[
            'title' => 'Đăng nhập'
        ]);
    }

    public function postLogin(LoginRequest  $request)
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password])) {
            $user = Auth::user();
            if($user->role=="admin"){
                return redirect()->route('admin-home-get');
            }else{
                return redirect()->back()->withErrors('Thông tin đăng nhập không chính xác')->withInput();
            }
        }
        else{
            return redirect()->back()->withErrors('Thông tin đăng nhập không chính xác')->withInput();
        }
    }
}
