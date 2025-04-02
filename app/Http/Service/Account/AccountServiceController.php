<?php

namespace App\Http\Service\Account;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AccountServiceController extends Controller
{
    public function delete($id)
    {
        try{
            $Account=User::find($id);
            $Account->delete();
            Session::flash('success','Xóa tài kkoản thành công');
        }
        catch (\Exception $exception){
            Session::flash('error','Xóa thất bại!'.$exception->getMessage());
        }
    }
}
