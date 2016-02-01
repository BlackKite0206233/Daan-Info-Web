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
    public function __construct(userRepositories $userRepositories ,studentRepositories $studentRepositories ,stuscoreRepositories $stuscoreRepositories)
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
        
    }

    public function update(Request $request)//put member/{member}
    {
        //編輯學生

    }

//    public function destroy(Request $request)// delete member/{member}
//    {
//        //刪除學生
//
//    }

    public function index()// get member/
    {

    }

    public function show(Request $request)// get member/{member}
    {

    }

    public function create()// get member/create
    {

    }

    public function edit()// get member/{member}/edit
    {

    }

}
