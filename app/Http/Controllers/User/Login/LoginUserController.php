<?php

namespace App\Http\Controllers\User\Login;

use App\Http\Controllers\Controller;
use App\Http\Request\Admin\Login\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function getLoginUser()
    {
        return view('User.Login.login');
    }

    public function postLoginUser(LoginRequest $request)
    {
        if(Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password])) {
            $user =Auth::guard('web')->user();
            if($user->role=="user"){
                return redirect()->route('homekhophim-get');
            }else{
                return redirect()->back()->withErrors('Thông tin đăng nhập không chính xác')->withInput();
            }
        }
        else{
            return redirect()->back()->withErrors('Thông tin đăng nhập không chính xác')->withInput();
        }
    }

    public function getLogoutUser()
    {
        Auth::guard('web')->logout();
        return redirect()->back();
    }
}
