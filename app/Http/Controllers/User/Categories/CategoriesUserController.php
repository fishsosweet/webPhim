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
    protected $categoryService;

    public function filter(Request $request)
    {
        $country = $request->country;
        $category = $request->category;
        $sort = $request->sort;

        $query = Movie::query();

        // Lọc theo quốc gia
        if (!empty($country) && $country != 'none') {
            $query->where('country', $country);
        }

// 🔹 Lọc theo 1 thể loại (nếu có chọn)
        if (!empty($category) && $category != 'none') {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('categories.id', $category);
            });
        }

// 🔹 Sắp xếp theo tiêu chí được chọn
        if (!empty($sort) && $sort != 'none') {
            if ($sort === "latest") {
                $query->orderBy('release_year', 'desc');
            } elseif ($sort === "oldest") {
                $query->orderBy('release_year', 'asc');
            } elseif ($sort === "most_viewed") {
                $query->orderBy('views', 'desc');
            }
        }

        $movies = $query->get();
        if ($movies->isEmpty()) {
            return response()->json(['html' => '<p style="font-size: 20px; color: white">Không có phim phù hợp.</p>']);
        }

        $html = view('User.Categories.movie_list', compact('movies'))->render();
        return response()->json(['html' => $html]);
    }

    public function __construct(HomeMovieServiceController $homeMovieService,HomeCategoriesController $categoryService){
        $this->homeMovieService = $homeMovieService;
        $this->categoryService = $categoryService;
    }
    public function getPhimMoi()
    {
        return $this->categoryService->renderCategoryView('Phim mới', Movie::where('created_at', '>=', Carbon::now()->subDays(7))
            ->where('active', '1')
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
