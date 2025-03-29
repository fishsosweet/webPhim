<?php

namespace App\Http\Controllers\User\Movies;

use App\Http\Controllers\Controller;
use App\Http\Service\MovieService\HomeMovieServiceController;
use App\Models\Comment;
use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesUserController extends Controller
{
    protected $moviesService;


    public function __construct(HomeMovieServiceController $homeMovieServiceController)
    {
        $this->moviesService = $homeMovieServiceController;
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'content' => 'required|string|max:500', // Đảm bảo content là string
        ]);
        $comment = Comment::create([
            'movie_id' => $validated['movie_id'],
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return response()->json(['success' => true, 'comment' => $comment->load('user')]);
    }

    // ✅ Lấy bình luận mới nhất
    public function latest($movie_id)
    {
        $comments = Comment::where('movie_id', $movie_id)
            ->latest()
            ->with('user') // Load thông tin user
            ->get();

        return response()->json(['comments' => $comments]);
    }
    public function getPhim($id)
    {
        $movie=Movie::find($id);
        $cmt=$movie->comments()->with('user')->get();
        $movie->increment('views');
        return $this->moviesService->renderMovieView($movie,$cmt);
    }
}
