<?php

namespace App\Http\Controllers\User\Login;

use App\Http\Controllers\Controller;
use App\Http\Request\Admin\Login\LoginRequest;
use App\Http\Request\User\Register\RegisterRequest;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

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

    public function postDangKyUser(RegisterRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            session()->flash('success','Đăng ký tài khoản thành công');
            return redirect()->back();
        }catch (\Exception $exception){
            session()->flash('error','Email đã đăng kí tài khoản');
            return redirect()->back();
        }

    }

    public function getLogoutUser()
    {
        Auth::guard('web')->logout();
        return redirect()->back();
    }
}
