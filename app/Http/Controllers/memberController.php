<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Repositories\userRepositories;
use daan_info_web\Repositories\topicRepositories;
use daan_info_web\Repositories\studentRepositories;
use daan_info_web\Repositories\stuscoreRepositories;

use daan_info_web\Services\memberServices;

class memberController extends Controller
{
    protected $userRepositories;
    protected $topicRepositories;
    protected $studentRepositories;
    protected $stuscoreRepositories;

    protected $memberServices;
    public function __construct(userRepositories $userRepositories ,
                              topicRepositories $topicRepositories ,
                              studentRepositories $studentRepositories ,
                              stuscoreRepositories $stuscoreRepositories,
                              memberServices $memberServices)
    {
        $this->middleware('adminMiddleware',['except'=>['update','changePwd']]);
        $this->userRepositories = $userRepositories;
        $this->topicRepositories = $topicRepositories;
        $this->studentRepositories = $studentRepositories;
        $this->stuscoreRepositories = $stuscoreRepositories;

        $this->memberServices = $memberServices;
    }
    //
    public function store(Request $request)//post member
    {
        //新增學生
        $this->userRepositories
             ->insert($request['acc'],$request['password'],$request['name'],"s",$request['group']);

        $this->stuscoreRepositories
             ->insert($request['acc']);

        $hasTopic = $this->topicRepositories
                         ->getTopicFromGroupNo($request['group']);
        if($hasTopic == NULL)
            $this->topicRepositories
                 ->insert($request['group']);

    }

    public function update(Request $request)//put member/{member}
    {
        //修改密碼
        if($this->memberServices
               ->updatePwd($request['member'],$request['oldPwd'],$request['newPwd'],$request['retypePwd']))
            return redirect('topic/showTopic');

        return redirect('changePwd');
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

    public function changePwd()
    {
        //修改密碼 頁面
        return view('pwd');
    }

}
