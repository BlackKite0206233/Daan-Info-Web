<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Services\loginServices;

class userController extends Controller
{
    protected $loginServices;

    public function __construct(loginServices $loginServices)
    {
        $this->loginServices = $loginServices;
    }
    //
    public function index()// get /login
    {
        //登入 頁面
        return view('login');
    }

    public function store(Request $request)// post /login
    {
        //登入驗證
        $login = $this->loginServices
                      ->login($request['ID'],$request['password']);

        session(['status'=>$login]);

        if($login == 1)
            return redirect('/login');

        return redirect('/');
    }

    public function logout()
    {
        //登出
        $logout = $this->loginServices
                       ->logout();

        session(['status'=>$logout]);
        return redirect('/');
    }

}
