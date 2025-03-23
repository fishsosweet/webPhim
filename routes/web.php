<?php

use \App\Http\Controllers\Admin\Login\LoginController;
use \App\Http\Controllers\Admin\HomeController;
use \App\Http\Controllers\Admin\Categories\CategoriesController;
use \App\Http\Controllers\Admin\Movie\MovieController;
use Illuminate\Support\Facades\Route;



Route::get('login-admin',[LoginController::class,'getLogin'])->name('login');
Route::post('login-admin',[LoginController::class,'postLogin'])->name('login-admin-post');

Route::middleware(['auth'])->group(function () {
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

   });
});
