<?php

namespace App\Http\Controllers\User\Login;

use App\Http\Controllers\Controller;
use App\Http\Request\Admin\Login\LoginRequest;
use App\Http\Request\User\Register\RegisterRequest;
use App\Mail\SendOtpMail;
use App\Models\User;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Mail;


class LoginUserController extends Controller
{
    public function getLoginUser()
    {
        $users = User::whereNull('status')
            ->where('otp_expires', '<', now())
            ->get();
        foreach ($users as $user) {
            $user->delete();
        }
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
            $otp = rand(100000, 999999);
            User::create([
                'name' => $request->name,
                'email' => $request->emailregi,
                'password' => bcrypt($request->passwordregi),
                'otp' => $otp,
                'otp_expires' => Carbon::now()->addMinutes(1),
            ]);
            session(['email' => $request->emailregi]);
            $mail=$request->emailregi;
            $name=$request->name;
            Mail::send('User.Login.otp',['otp'=>$otp],function ($email) use ($mail,$name) {
                $email->subject('Xác nhận mã OTP!');
                $email->to($mail,$name);
            });
            return redirect()->route('otp-get');
        }catch (\Exception $exception){
            session()->flash('error','Email đã đăng kí tài khoản'.$exception->getMessage());
            return redirect()->back();
        }

    }

    public function getLogoutUser()
    {
        Auth::guard('web')->logout();
        return redirect()->back();
    }
}
