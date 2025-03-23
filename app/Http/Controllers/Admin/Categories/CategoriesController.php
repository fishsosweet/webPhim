<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Request\Admin\Categori\CategoriRequest;
use App\Http\Service\CategoriService\CategoriServiceController;
use App\Models\Categorie;

class CategoriesController extends Controller
{
    protected $categoriesService;
    public function __construct(CategoriServiceController $categoriService)
    {
        $this->categoriesService = $categoriService;
    }
    public function getThemTheLoai()
    {
        return view('Amin.Categories.add',[
        'title'=>'Thêm thể loại',]
        );
    }
    public function postThemTheLoai(CategoriRequest $request)
    {
        $this->categoriesService->post($request);
        return redirect()->back();
    }
    public function getListTheLoai(){
        $Categories = $this->categoriesService->list();
        return view('Amin.Categories.list',[
            'title'=>'Danh mục thể loại',
            'Categories'=>$Categories
        ]);
    }

    public function getSuaTheLoai($id){
        $id=Categorie::find($id);
        return view('Amin.Categories.edit',[
            'title' => 'Chỉnh sửa thể loại',
            'Categories'=>$id
        ]);

    }

    public function postSuaTheLoai($id,CategoriRequest $request){
        $this->categoriesService->edit($id,$request);
        return redirect()->back();
    }

    public function postXoaTheLoai($id){
        $this->categoriesService->delete($id);
        return redirect()->back();
    }

}
