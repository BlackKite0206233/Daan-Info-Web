<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use daan_info_web\Repositories\UserRepository;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Repositories\userRepositories;

class userController extends Controller
{
    protected $userRepositories;

    public function __construct(userRepositories $userRepositories)
    {
        $this->userRepositories = $userRepositories;
    }
    //
    public function index()// get /login
    {

    }

    public function create(Request $request)// post /login
    {
        //登入驗證
        $this->userRepositories
            ->login($request['acc'],$request['password']);
    }

    public function logout()
    {
        //登出
        $this->userRepositories
            ->logout();

    }

}
