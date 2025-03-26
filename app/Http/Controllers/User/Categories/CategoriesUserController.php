<?php

namespace App\Http\Controllers\User\Categories;

use App\Http\Controllers\Controller;
use App\Http\Service\CategoriService\HomeCategoriesController;
use App\Http\Service\MovieService\HomeMovieServiceController;
use App\Models\Categorie;
use App\Models\Movie;
use Carbon\Carbon;

class CategoriesUserController extends Controller
{
    protected $homeMovieService;
    protected $categoryService;

    public function __construct(HomeMovieServiceController $homeMovieService,HomeCategoriesController $categoryService){
        $this->homeMovieService = $homeMovieService;
        $this->categoryService = $categoryService;
    }
    public function getPhimMoi()
    {
        return $this->categoryService->renderCategoryView('Phim mới', Movie::where('created_at', '>=', Carbon::now()->subDays(7))
            ->where('active', '1')
            ->limit(20)
            ->get());
    }

    public function getTheLoai($id)
    {
        $cates = $this->homeMovieService->getCates();
        $nameCates = $cates->firstWhere('id', $id);
        return $this->categoryService->renderCategoryView($nameCates->name ?? 'Thể loại',
            Movie::whereHas('category', fn($query) => $query->where('id', $id))->get()
        );
    }

    public function getQuocGia($country)
    {
        return $this->categoryService->renderCategoryView('Quốc gia: '.urldecode($country),
            Movie::where('country', urldecode($country))->get()
        );
    }

    public function getTuoi($age)
    {
        return $this->categoryService->renderCategoryView('Độ tuổi: '.$age,
            Movie::where('age_restrict', $age)->get()
        );
    }



}
