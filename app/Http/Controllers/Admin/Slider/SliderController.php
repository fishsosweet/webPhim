<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Http\Request\Admin\Slider\SliderRequest;
use App\Http\Service\Slider\SliderServiceController;
use App\Models\Slider;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderServiceController $sliderService)
    {
        $this->sliderService = $sliderService;
    }
    public function getSlider()
    {
        return view('Amin.Slide.add',[
            'title' => 'Thêm slider'
        ]);
    }

    public function postSlider(SliderRequest $request)
    {
        $this->sliderService->post($request);
        return redirect()->back();
    }

    public function getListSlider(){
        $sliders=$this->sliderService->list();
        return view('Amin.Slide.list',[
           'Slider' => $sliders
        ]);
    }

    public function getSuaSlider($id){
        $slider=Slider::find($id);
        return view('Amin.Slide.edit',[
            'title'=>'Chỉnh sửa slider',
            'Slider'=>$slider
        ]);
    }

    public function postSuaSlider($id, SliderRequest $request){
        $this->sliderService->edit($id,$request);
        return redirect()->back();
    }

    public function postXoaSlider($id){
        $this->sliderService->delete($id);
        return redirect()->back();
    }
}
