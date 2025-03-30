<?php

namespace App\Http\Controllers\User\Login;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Request;
use App\Http\Controllers\User\Login\LoginUserController;
use \App\Http\Request\User\OTP\OTPRequest;
use Mail;

class OTP extends Controller
{

    public function getOTP()
    {
        return view('User.Login.otpget');
    }

    public function postOTP(OTPRequest $request){
        $otp = implode('', $request->otp);
        $email = session('email');

        if (!$email) {
            return redirect()->back()->with('error', 'Không tìm thấy email, vui lòng đăng ký lại.');
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email không hợp lệ.');
        }

        if ($user->otp === $otp && now()->lessThan($user->otp_expires)) {
            $user->update(['otp' => null, 'otp_expires' => null,'status' => 'active']);
            session()->forget('email');
            return redirect()->route('login-khophim-get')->with('success', 'Đăng ký tài khoản thành công!');
        }

        return redirect()->back()->with('error', 'Mã OTP không hợp lệ hoặc đã hết hạn.');
    }

    public function postOTPagain()
    {
        $email = session('email');

        if (!$email) {
            return redirect()->route('register')->with('error', 'Không tìm thấy email, vui lòng đăng ký lại.');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'Email không hợp lệ.');
        }

        $otp = rand(100000, 999999);
        $user->update(['otp' => $otp, 'otp_expires' => now()->addMinutes(5)]);
        Mail::send('User.Login.otp',['otp'=>$otp],function ($email) use ($user) {
            $email->subject('Xác nhận thành công đơn hàng!');
            $email->to($user->email,$user->name);
        });
        return redirect()->back()->with('success', 'OTP đã được gửi lại!');
    }
}
