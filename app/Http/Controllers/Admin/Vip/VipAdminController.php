<?php

namespace App\Http\Controllers\Admin\Vip;

use App\Http\Controllers\Controller;
use App\Http\Request\Admin\Slider\VipRequest;
use App\Http\Service\Vip\VipServiceController;

class VipAdminController extends Controller
{
    protected $vipService;
    public function __construct(VipServiceController $vipService)
    {
        $this->vipService = $vipService;
    }
    public function getThemVip(){
        return view('Amin.Vip.add',[
            'title'=>'Thêm gói VIP'
        ]);
    }
    public function postThemVip(\App\Http\Request\Admin\Vip\VipRequest $request){
        $this->vipService->post($request);
        return redirect()->back();
    }
    public function getListVip(){
        $Vip= $this->vipService->list();
        return view('Amin.Vip.list',[
            'title'=>'Danh mục gói VIP',
            'Vip'=>$Vip
        ]);
    }


    public function postXoaVip($id){
        $this->vipService->delete($id);
        return redirect()->back();
    }
}
