<?php

namespace App\Http\Service\CategoriService;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Song;
use Illuminate\Support\Facades\Session;

class CategoriServiceController extends Controller
{

    public function list(){
        return Categorie::select('id','name','thum','active','updated_at')->paginate(10);
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
            Categorie::create([
                'name'=>$request->tentheloai,
                'thum'=>$pathanh,
                'active'=>$request->active,
            ]);
            Session::flash('success','Thêm thể loại thành công');
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
            Categorie::where('id', $id)->update([
                'name' => $request->tentheloai,
                'thum' => $pathanh ?: Categorie::find($id)->thum,
                'active' => $request->active,
            ]);
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            Session::flash('error', 'Cập nhật thất bại: ' . $exception->getMessage());
        }
    }

    public function delete($id){
        try{
        $Categorie=Categorie::find($id);
        $Categorie->delete();
        Session::flash('success','Xóa thể loại thành công');
        }
        catch (\Exception $exception){
            Session::flash('error','Xóa thất bại!'.$exception->getMessage());
        }
    }
}
