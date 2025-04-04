<?php

namespace App\Http\Service\Vip;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Slider;
use App\Models\Subscription;
use Illuminate\Support\Facades\Session;

class VipServiceController extends Controller
{
    public function list(){
        return Subscription::select('id','name', 'plan', 'active','price')
            ->paginate(10);
    }
    public function post($request)
    {
        try{
            Subscription::create([
                'name'=>$request->tenvip,
                'plan'=>$request->plan,
                'active'=>$request->active,
                'price'=>$request->price,
            ]);
            Session::flash('success','Thêm gói Vip thành công');
        }catch (\Exception $exception){
            Session::flash('error','Thêm thất bại!'.$exception->getMessage());
        }
    }

    public function delete($id){
        try{
            $Vip=Subscription::find($id);
            $Vip->delete();
            Session::flash('success','Xóa gói Vip thành công');
        }
        catch (\Exception $exception){
            Session::flash('error','Xóa thất bại!'.$exception->getMessage());
        }
    }
}
