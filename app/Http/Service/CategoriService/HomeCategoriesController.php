<?php

namespace App\Http\Service\CategoriService;

use App\Http\Controllers\Controller;
use App\Http\Service\MovieService\HomeMovieServiceController;
use App\Models\Movie;

class HomeCategoriesController extends Controller
{
    protected $homeMovieService;
    public function __construct(HomeMovieServiceController $homeMovieService){
        $this->homeMovieService = $homeMovieService;
    }
    public function renderCategoryView($title, $movies)
    {
        return view('User.Categories.cates',[
                'title' => $title,
                'Phim' => $movies
            ]);
    }

    public function getFilter($request)
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

       return $movies = $query->get();
    }
}
