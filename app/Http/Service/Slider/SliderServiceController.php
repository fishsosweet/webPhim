<?php

namespace App\Http\Service\Slider;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Movie;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;

class SliderServiceController extends Controller
{
    public function list()
    {
        return Slider::select('id','name','thum','sort','active')->paginate(10);
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
            Slider::create([
                'name'=>$request->tenslider,
                'thum'=>$pathanh,
                'sort'=>$request->sapxep,
                'active'=>$request->active,
            ]);
            Session::flash('success','Thêm slider thành công');
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
            Slider::where('id', $id)->update([
                'name' => $request->tenslider,
                'thum' => $pathanh ?: Slider::find($id)->thum,
                'sort' => $request->sapxep,
                'active' => $request->active,
            ]);
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $exception) {
            Session::flash('error', 'Cập nhật thất bại: ' . $exception->getMessage());
        }
    }

    public function delete($id){
        try{
            $Slider=Slider::find($id);
            $Slider->delete();
            Session::flash('success','Xóa slider thành công');
        }
        catch (\Exception $exception){
            Session::flash('error','Xóa thất bại!'.$exception->getMessage());
        }
    }

}
