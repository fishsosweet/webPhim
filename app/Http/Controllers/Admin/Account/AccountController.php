<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Http\Service\Account\AccountServiceController;
use App\Models\User;

class AccountController extends Controller
{
    protected $userService;

    public function __construct(AccountServiceController $userService)
    {
        $this->userService = $userService;
    }
    public function getList()
    {
        return view('Amin.Account.list',[
            'Account' => User::with('subscription:id,user_id,name')->where('role','user')->paginate(10),
        ]);
    }

    public function postXoaAccount($id)
    {
        $this->userService->delete($id);
        return redirect()->back();
    }
}
