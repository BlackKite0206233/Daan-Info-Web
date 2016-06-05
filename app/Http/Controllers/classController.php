<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use daan_info_web\Repositories\classRepositories;

class classController extends Controller
{
    protected $classRepositories;

    public function __construct(classRepositories $classRepositories)
    {
        $this->classRepositories = $classRepositories;
    }
    //
    public function store(Request $request)//post class
    {
        //新增專題類別
        $this->classRepositories
             ->insert($request['typename']);
    }

    public function destroy(Request $request)// delete class/{class}
    {
        //刪除專題類別
        $this->classRepositories
             ->delete($request['id']);
    }

    public function index()// get class/
    {
        //編輯專題類別 頁面
        $class = $this->classRepositories
                      ->getAll();
    }

    public function create()// get class/create
    {
        //新增專題類別 頁面
    }

}
