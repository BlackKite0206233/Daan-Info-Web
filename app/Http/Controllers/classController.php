<?php
//管理專題類別
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

    //新增專題類別
    public function store(Request $request)                                             //post class
    {
        //新增專題類別(類別名稱)
        $this->classRepositories
             ->insert($request['typename']);
    }

    public function destroy($class,Request $request)                                    //delete class/{class}
    {
        //刪除專題類別
        $this->classRepositories
             ->delete($class);
    }

    //編輯專題類別 頁面
    public function index()                                                            //get class/
    {
        //取得所有專題類別
        $class = $this->classRepositories
                      ->getAll();
    }

    //新增專題類別 頁面
    public function create()                                                           //get class/create
    {

    }

}
