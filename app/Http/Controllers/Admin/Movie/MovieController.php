<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Http\Request\Admin\Movie\MovieRequest;
use App\Http\Service\MovieService\MovieServiceController;
use App\Models\Categorie;
use App\Models\Movie;

class MovieController extends Controller
{
    protected $movieService;
    public function __construct(MovieServiceController $movieService)
    {
        $this->movieService = $movieService;
    }
    public function getThemPhim()
    {
        $Catogories=Categorie::select('id','name')->get();
        return view('Amin.Movie.add',[
            'title' => 'Thêm phim',
            'Catogories' => $Catogories
        ]);
    }

    public function postThemPhim(MovieRequest $request)
    {
        $this->movieService->post($request);
        return redirect()->back();
    }

    public function getListPhim(){
        $movie=$this->movieService->list();
        return view('Amin.Movie.list',[
            'Movies'=>$movie,
        ]);
    }

    public function getSuaPhim($id)
    {
        $Catogories=Categorie::select('id','name')->get();
        $movi=Movie::find($id);
        return view('Amin.Movie.edit',[
            'title'=>'Chỉnh sửa phim',
            'Movie'=>$movi,
            'Catogories' => $Catogories
        ]);
    }
    public function postSuaPhim(MovieRequest $request,$id)
    {
        $this->movieService->edit($id,$request);
        return redirect()->back();
    }

    public function postXoaPhim($id)
    {
        $this->movieService->delete($id);
        return redirect()->back();

    }
}
