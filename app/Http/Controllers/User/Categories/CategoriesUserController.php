<?php

namespace App\Http\Controllers\User\Categories;

use App\Http\Controllers\Controller;
use App\Http\Service\CategoriService\HomeCategoriesController;
use App\Http\Service\MovieService\HomeMovieServiceController;
use App\Models\Categorie;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoriesUserController extends Controller
{
    protected $homeMovieService;
    protected $homeCategoryService;

    public function filter(Request $request)
    {
        $movies=$this->homeCategoryService->getFilter($request);
        $user = auth('web')->user();
        if (!$user->vip_status) {
            $movies = $movies->where('is_vip', 0);
        }
        if ($movies->isEmpty()) {
            return response()->json(['html' => '<p style="font-size: 20px; color: white">Không có phim phù hợp.</p>']);
        }
        $html = view('User.Categories.movie_list', compact('movies'))->render();
        return response()->json(['html' => $html]);
    }

    public function __construct(HomeMovieServiceController $homeMovieService,HomeCategoriesController $categoryService){
        $this->homeMovieService = $homeMovieService;
        $this->homeCategoryService = $categoryService;
    }
    public function getPhimMoi()
    {
        return $this->homeCategoryService->renderCategoryView('Phim mới', Movie::
            where('active', '1')->orderBy('created_at', 'desc')
            ->get());
    }


    public function getTheLoai($id)
    {
        $cates = $this->homeMovieService->getCates();
        $nameCates = $cates->firstWhere('id', $id);
        return $this->homeCategoryService->renderCategoryView($nameCates->name ?? 'Thể loại',
            Movie::whereHas('category', fn($query) => $query->where('id', $id))->get()
        );
    }

    public function getQuocGia($country)
    {
        return $this->homeCategoryService->renderCategoryView('Quốc gia: '.urldecode($country),
            Movie::where('country', urldecode($country))->get()
        );
    }

    public function getTuoi($age)
    {
        return $this->homeCategoryService->renderCategoryView('Độ tuổi: '.$age,
            Movie::where('age_restrict', $age)->get()
        );
    }




}
