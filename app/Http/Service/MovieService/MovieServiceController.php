<?php

namespace App\Http\Service\MovieService;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Movie;
use Illuminate\Support\Facades\Session;

class MovieServiceController extends Controller
{

    public function list()
    {
        return Movie::select('id','title','description','release_year','duration','poster_url','age_restrict','active')->paginate(10);
    }
    public function post($request)
    {
        try{
            $pathanh='';
            if($request->hasFile('anh') && $request->file('anh')->isValid()){
                $nameimage = $request->file('anh')->getClientOriginalName();
                $path='uploads/'.date("Y/m/d");
                $request->file('anh')->move(public_path($path), $nameimage);
                $pathanh=$path.'/'.$nameimage;
            }
            else{
                Session::flash('error','Thêm thất bại!');
            }
            $movie=Movie::create([
                'title'=>$request->tenphim,
                'description'=>strip_tags($request->mota),
                'country'=>$request->quocgia,
                'release_year'=>$request->namxuatban,
                'duration'=>$request->thoiluong,
                'poster_url'=>$pathanh,
                'trailer_url'=>$request->trailer,
                'video_url'=>$request->phim,
                'age_restrict'=>$request->luatuoi,
                'active'=>$request->active,
            ]);
            if ($request->has('theloai')) {
                $movie->category()->sync($request->theloai);
            }
            Session::flash('success','Thêm phim thành công');
        }catch (\Exception $exception){
            Session::flash('error','Thêm thất bại!'.$exception->getMessage());
        }
    }

    public function edit($id, $request)
    {
        try {
            $pathanh = '';
            if ($request->hasFile('anh')) {
                $file = $request->file('anh');
                if ($file->isValid()) {
                    $nameimage = $file->getClientOriginalName();
                    $path = 'uploads/' . date("Y/m/d");
                    if (!file_exists(public_path($path))) {
                        mkdir(public_path($path), 0777, true);
                    }
                    if ($file->move(public_path($path), $nameimage)) {
                        $pathanh = $path . '/' . $nameimage;
                    } else {
                        throw new \Exception("Không thể di chuyển file ảnh.");
                    }
                } else {
                    throw new \Exception("File ảnh không hợp lệ.");
                }
            }
            $movie = Movie::find($id);
            if (!$movie) {
                throw new \Exception("Phim không tồn tại.");
            }
            $movie->update([
                'title' => $request->tenphim,
                'description' => strip_tags($request->mota),
                'contry'=>$request->quocgia,
                'release_year' => $request->namxuatban,
                'duration' => $request->thoiluong,
                'poster_url' => $pathanh ?: $movie->poster_url,
                'trailer_url' => $request->trailer,
                'video_url' => $request->phim,
                'age_restrict' => $request->luatuoi,
                'active' => $request->active,
            ]);
            if ($request->has('theloai')) {
                $movie->category()->sync($request->theloai);
            }

            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            Session::flash('error', 'Cập nhật thất bại: ' . $exception->getMessage());
        }
    }


    public function delete($id){
        try{
            $Movie=Movie::find($id);
            $Movie->delete();
            Session::flash('success','Xóa phim thành công');
        }
        catch (\Exception $exception){
            Session::flash('error','Xóa thất bại!'.$exception->getMessage());
        }
    }
}
