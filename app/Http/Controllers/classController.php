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
        //新增分類
        if(isset($request['typename']))
            $this->classRepositories
                ->insert($request['typename']);
    }

    public function update(Request $request)//put class/{class}
    {
        //編輯分類
        if(isset($request['typename']))
            $this->classRepositories
                ->edit($request['id'],$request['typename']);
    }

    public function destroy(Request $request)// delete class/{class}
    {
        //刪除分類
        $this->classRepositories
            ->delete($request['id']);
    }

    public function index()// get class/
    {
        $class = $this->classRepositories
                        ->all();
    }

    public function create()// get class/create
    {

    }

    public function edit()// get class/{class}/edit
    {

    }
}
