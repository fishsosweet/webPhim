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
            'content' => 'required|string|max:500',
        ]);
        $comment = Comment::create([
            'movie_id' => $validated['movie_id'],
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return response()->json(['success' => true, 'comment' => $comment->load('user')]);
    }

    // Lấy bình luận mới nhất
    public function latest($movie_id,Request $request)
    {
        $latestCommentId = $request->input('latest_id', 0);
        $comments = Comment::where('movie_id', $movie_id)
            ->where('id', '>', $latestCommentId)
            ->latest()
            ->with('user')
            ->get();
        return response()->json(['comments' => $comments]);
    }
    public function getPhim($id)
    {
        $movie=Movie::find($id);
        $cmt=$movie->comments()->with('user')->latest()->get();
        $movie->increment('views');
        return $this->moviesService->renderMovieView($movie,$cmt);
    }
}
