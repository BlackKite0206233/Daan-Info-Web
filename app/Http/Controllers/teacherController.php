<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use daan_info_web\Repositories\teacherRepositories;
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
            ->insert($request['acc'],$request['acc_id'],$request['password'],$request['memberno'],"t");

        $this->teacherlistRepositories
            ->insert($request['memberno'],$request['name']);

    }

    public function create()// get teacher/create
    {

    }

    public function index()// get teacher
    {

    }
}
