<?php
//管理老師
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

    //新增老師
    public function store(Request $request)                                                                      //post teacher
    {
        //user資料表新增一筆老師資料(帳號、密碼、姓名、身分)
        $this->userRepositories
             ->insert($request['acc'],$request['password'],$request['name'],"t","");
    }

    //新增老師 頁面
    public function create()                                                                                     //get teacher/create
    {

    }

    //老師列表
    public function index()                                                                                      //get teacher
    {
        //取得所有老師
        $teacher = $this->teacherlistRepositories
                        ->getTeacher();
    }
}
