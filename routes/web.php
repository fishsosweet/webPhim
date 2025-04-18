<?php

use \App\Http\Controllers\Admin\Login\LoginController;
use \App\Http\Controllers\Admin\Account\AccountController;
use \App\Http\Controllers\Admin\HomeController;
use \App\Http\Controllers\Admin\Vip\VipAdminController;
use \App\Http\Controllers\Admin\Categories\CategoriesController;
use \App\Http\Controllers\Admin\Movie\MovieController;
use \App\Http\Controllers\Admin\Slider\SliderController;
use \App\Http\Controllers\User\HomeKhoPhimController;
use \App\Http\Controllers\User\Categories\CategoriesUserController;
use \App\Http\Controllers\User\Login\LoginUserController;
use \App\Http\Controllers\User\Login\OTP;
use \App\Http\Controllers\User\Vip\VipController;
use \App\Http\Controllers\User\Movies\MoviesUserController;
use App\Http\Middleware\UserAuthMiddleware;
use Illuminate\Support\Facades\Route;
use App\Livewire\MovieFilter;
use Livewire\Livewire;


//Admin

Route::get('login-admin',[LoginController::class,'getLogin'])->name('login');
Route::post('login-admin',[LoginController::class,'postLogin'])->name('login-admin-post');

Route::middleware([\App\Http\Middleware\AdminAuthMiddleware::class])->group(function () {
   Route::prefix('admin')->group(function () {
       Route::get('/',[HomeController::class,'getHomeAdmin'])->name('admin-home-get');

       //TheLoai
       Route::get('add-categories',[CategoriesController::class,'getThemTheLoai'])->name('add-categories-get');
       Route::post('add-categories',[CategoriesController::class,'postThemTheLoai'])->name('add-categories-post');
       Route::get('list-categories',[CategoriesController::class,'getListTheLoai'])->name('list-categories-get');
       Route::get('edit-categories/{id}',[CategoriesController::class,'getSuaTheLoai'])->name('edit-categories-get');
       Route::post('edit-categories/{id}',[CategoriesController::class,'postSuaTheLoai'])->name('edit-categories-post');
       Route::delete('delete-categories/{id}',[CategoriesController::class,'postXoaTheLoai'])->name('delete-categories-post');

       //Phim
       Route::get('add-movie',[MovieController::class,'getThemPhim'])->name('add-movie-get');
       Route::post('add-movie',[MovieController::class,'postThemPhim'])->name('add-movie-post');
       Route::get('list-movie',[MovieController::class,'getListPhim'])->name('list-movie-get');
       Route::get('edit-movie/{id}',[MovieController::class,'getSuaPhim'])->name('edit-movie-get');
       Route::post('edit-movie/{id}',[MovieController::class,'postSuaPhim'])->name('edit-movie-post');
       Route::delete('delete-movie/{id}',[MovieController::class,'postXoaPhim'])->name('delete-movie-post');

       //Slider
       Route::get('add-slider',[SliderController::class,'getSlider'])->name('add-slider-get');
       Route::post('add-slider',[SliderController::class,'postSlider'])->name('add-slider-post');
       Route::get('list-slider',[SliderController::class,'getListSlider'])->name('list-slider-get');
       Route::get('edit-slider/{id}',[SliderController::class,'getSuaSlider'])->name('edit-slider-get');
       Route::post('edit-slider/{id}',[SliderController::class,'postSuaSlider'])->name('edit-slider-post');
       Route::delete('delete-slider/{id}',[SliderController::class,'postXoaSlider'])->name('delete-slider-post');
        //Account
       Route::get('list-account',[AccountController::class,'getList'])->name('add-account-get');
       Route::delete('delete-account/{id}',[AccountController::class,'postXoaAccount'])->name('delete-account-post');
       //Vip
       Route::get('add-vip',[VipAdminController::class,'getThemVip'])->name('add-vip-get');
       Route::post('add-vip',[VipAdminController::class,'postThemVip'])->name('add-vip-post');
       Route::get('list-vip',[VipAdminController::class,'getListVip'])->name('list-vip-get');
       Route::delete('delete-vip/{id}',[VipAdminController::class,'postXoaVip'])->name('delete-vip-post');
   });
});



//User

 Route::get('khophim',[HomeKhoPhimController::class,'getHomeKhoPhim'])->name('homekhophim-get');
Route::post('khophim',[HomeKhoPhimController::class,'getSearch'])->name('search');
 Route::get('khophim/login',[LoginUserController::class,'getLoginUser'])->name('login-khophim-get');
Route::post('khophim/login',[LoginUserController::class,'postLoginUser'])->name('login-khophim-post');
Route::post('khophim/register',[LoginUserController::class,'postDangKyUser'])->name('register-khophim-post');
Route::get('logout',[LoginUserController::class,'getLogoutUser'])->name('logout-khophim-get');
Route::get('otp',[OTP::class,'getOTP'])->name('otp-get');
Route::post('otp',[OTP::class,'postOTP'])->name('otp-post');
Route::post('otp-again',[OTP::class,'postOTPagain'])->name('otpagain-post');
Route::get('khophim/vip/upgrade/',[VipController::class,'getVip'])->name('vip-get');
Route::post('khophim/vip/upgrade/{id}',[VipController::class,'postVipVNPay'])->name('vip-post');
Route::get('khophim/vip/process/',[VipController::class,'vnpayReturn'])->name('vipprocess-get');
Route::middleware([UserAuthMiddleware::class])->group(function () {
    Route::prefix('khophim')->group(function () {
        //TheLoai
        Route::get('categories/{id}-{name}', [CategoriesUserController::class, 'getTheLoai'])->name('khophim-categories-get');
        Route::get('country/{country}',[CategoriesUserController::class, 'getQuocGia'])->name('khophim-country-get');
        Route::get('newmovie',[CategoriesUserController::class, 'getPhimMoi'])->name('khophim-newmovies-get');
        Route::get('age/{age}',[CategoriesUserController::class, 'getTuoi'])->name('khophim-age-get');
        Route::get('/movies/sort', [CategoriesUserController::class, 'sort'])->name('movies.sort');
        Route::get('/movies/filter', [CategoriesUserController::class, 'filter'])->name('movies.filter');
        //Phim
        Route::get('watch/{id}-{name}',[MoviesUserController::class,'getPhim'])->name('khophim-watch-get');
        Route::post('/comments/store', [MoviesUserController::class, 'store'])->name('comments.store');
        Route::get('/comments/latest/{id}-{name}', [MoviesUserController::class, 'latest'])->name('comments.latest');
    });
});


