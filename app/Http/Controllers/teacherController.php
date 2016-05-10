<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use daan_info_web\Repositories\teacherlistRepositories;
use daan_info_web\Repositories\userRepositories;

class teacherController extends Controller
{
    protected $teacherlistRepositories;
    protected $userRepositories;

    public function __construct(teacherlistRepositories $teacherlistRepositories,
                              userRepositories $userRepositories)
    {
        $this->teacherlistRepositories = $teacherlistRepositories;
        $this->userRepositories = $userRepositories;
    }
    //
    public function store(Request $request)//post teacher
    {
        //新增老師
        $this->userRepositories
             ->insert($request['acc'],$request['password'],$request['name'],"t",$request['group']);
    }

    public function create()// get teacher/create
    {
        //新增老師 頁面
    }

    public function index()// get teacher
    {
        //老師列表
        $teacher = $this->teacherlistRepositories
                        ->getTeacher();
    }
}
