<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Repositories\userRepositories;
use daan_info_web\Repositories\studentRepositories;
use daan_info_web\Repositories\stuscoreRepositories;

class memberController extends Controller
{
    protected $userRepositories;
    protected $studentRepositories;
    protected $stuscoreRepositories;
    public function __construct(userRepositories $userRepositories ,
                              studentRepositories $studentRepositories ,
                              stuscoreRepositories $stuscoreRepositories)
    {
        $this->middleware('adminMiddleware',['except'=>['update','edit']]);
        $this->userRepositories = $userRepositories;
        $this->studentRepositories = $studentRepositories;
        $this->stuscoreRepositories = $stuscoreRepositories;
    }
    //
    public function store(Request $request)//post member
    {
        //新增學生
        $this->userRepositories
             ->insert($request['acc'],$request['password'],$request['name'],"s",$request['group']);

        $this->stuscoreRepositories
             ->insert($request['acc']);
        
    }

    public function update(Request $request)//put member/{member}
    {
        //修改密碼
        $this->userRepositories
             ->edit($request['id'],$request['password']);
    }

    public function index()// get member/
    {
        //所有學生 頁面
        $stu = $this->studentRepositories
                    ->getAll();
    }

    public function show(Request $request)// get member/{member}
    {
        //依年度
        $stu = $this->studentRepositories
                    ->getFromYear($request['year']);
    }

    public function create()// get member/create
    {
        //新增學生 頁面
    }

    public function edit()// get member/{member}/edit
    {
        //修改密碼 頁面
    }

}
