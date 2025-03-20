<?php

use \App\Http\Controllers\Admin\Login\LoginController;
use \App\Http\Controllers\Admin\HomeController;
use \App\Http\Controllers\Admin\Categories\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('login-admin',[LoginController::class,'getLogin'])->name('login-admin-get');
Route::post('login-admin',[LoginController::class,'postLogin'])->name('login-admin-post');

Route::middleware(['auth'])->group(function () {
   Route::prefix('admin')->group(function () {
       Route::get('/',[HomeController::class,'getHomeAdmin'])->name('admin-home-get');

       //TheLoai
       Route::get('add-categories',[CategoriesController::class,'getThemTheLoai'])->name('add-categories-get');
   });
});
