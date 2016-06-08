<?php
//管理學生、修改密碼(老師、學生)
namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Repositories\userRepositories;
use daan_info_web\Repositories\studentRepositories;
use daan_info_web\Repositories\stuscoreRepositories;

use daan_info_web\Services\memberServices;

class memberController extends Controller
{
    protected $userRepositories;
    protected $studentRepositories;
    protected $stuscoreRepositories;

    protected $memberServices;
    public function __construct(userRepositories $userRepositories ,
                              studentRepositories $studentRepositories ,
                              stuscoreRepositories $stuscoreRepositories ,
                              memberServices $memberServices)
    {
        $this->middleware('adminMiddleware',['except'=>['update','changePwd']]);
        $this->userRepositories = $userRepositories;
        $this->studentRepositories = $studentRepositories;
        $this->stuscoreRepositories = $stuscoreRepositories;

        $this->memberServices = $memberServices;
    }

    //新增學生
    public function store(Request $request)                                                               //post member
    {
        //user資料表新增一筆學生資料(帳號、密碼、姓名、身分)
        $this->userRepositories
             ->insert($request['acc'],$request['password'],$request['name'],"s");

        //stuscore資料表新增一筆資料(帳號)
        $this->stuscoreRepositories
             ->insert($request['acc']);
    }

    //修改密碼(老師、學生)
    public function update(Request $request,$member)                                                      //put member/{member}
    {
        //修改成功=>登出，重新登入
        if($this->memberServices
               ->updatePwd($member,$request['oldPwd'],$request['newPwd'],$request['retypePwd']))
            return redirect('logout');

        return redirect('changePwd');
    }

    //顯示所有學生
    public function index()                                                                               //get member/
    {
        //取得所有學生
        $stu = $this->studentRepositories
                    ->getAll();
    }

    //依年度顯示學生
    public function show($member)                                                                        //get member/{member}
    {
        //取得指定年度學生
        $stu = $this->studentRepositories
                    ->getFromYear($member);
    }

    //新增學生 頁面
    public function create()                                                                             //get member/create
    {

    }

    //修改密碼 頁面
    public function changePwd()                                                                           //get changePwd
    {
        return view('pwd');
    }

}
