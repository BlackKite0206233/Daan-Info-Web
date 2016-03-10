<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    }

    public function create(Request $request)// post /login
    {
        //登入驗證
        $this->loginServices
                ->login($request['acc'],$request['password']);
    }

    public function logout()
    {
        //登出
        $this->loginServices
            ->logout();

    }

}
