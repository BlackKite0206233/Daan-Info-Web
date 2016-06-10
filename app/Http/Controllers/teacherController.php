<?php
//管理老師
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use daan_info_web\Repositories\teacherlistRepositories;
use daan_info_web\Repositories\userRepositories;
use daan_info_web\Repositories\teacherRepositories;

use daan_info_web\Services\uploadFactoryFunction\teacherpicFactory;

class teacherController extends Controller
{
    protected $teacherlistRepositories;
    protected $userRepositories;
    protected $teacherRepositories;
    protected $teacherpicFactory;

    public function __construct(teacherlistRepositories $teacherlistRepositories,
                              userRepositories $userRepositories,
                              teacherRepositories $teacherRepositories,
                              teacherpicFactory $teacherpicFactory)
    {
        $this->teacherlistRepositories = $teacherlistRepositories;
        $this->userRepositories = $userRepositories;
        $this->teacherRepositories = $teacherRepositories;
        $this->teacherpicFactory = $teacherpicFactory;
    }

    //新增老師
    public function store(Request $request)                                                                      //post teacher
    {
        //user資料表新增一筆老師資料(帳號、密碼、姓名、身分)
        $this->userRepositories
             ->insert($request['acc'],$request['password'],$request['name'],"t","");

        $file = $request->file('teacherpic');//老師照片

        //上傳照片(工廠方法模式  選擇teacherpicFactory)
        $factory = $this->teacherpicFactory;
        $pic = $factory->selectDB();
        $pic->setRule(['jpg','png','gif']);//設定允許的附檔名

        $teacherpic = $pic->uploadFile($file);//上傳

        //teacherpic資料表新增一筆資料(帳號、照片)
        if($teacherpic != "")
            $this->teacherRepositories
                 ->insert($request['acc'],$teacherpic);
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
