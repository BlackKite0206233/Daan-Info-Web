<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use daan_info_web\Repositories\UserRepository;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    //
    public function index()// get /login
    {

    }

    public function create(Request $request)// post /login
    {
        //登入驗證

    }

    public function logout(Request $request)
    {
        //登出

    }

}
