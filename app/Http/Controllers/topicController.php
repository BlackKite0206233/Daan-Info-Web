<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Repositories\topicRepositories;
use daan_info_web\Repositories\teacherRepositories;
use daan_info_web\Repositories\studentRepositories;
use daan_info_web\Repositories\userRepositories;

use daan_info_web\Services\topicServices;

class topicController extends Controller
{
    protected $topicRepositories;
    protected $teacherRepositories;
    protected $studentRepositories;
    protected $userRepositories;

    protected $topicServices;

    public function __construct(topicRepositories $topicRepositories ,
                              teacherRepositories $teacherRepositories ,
                              studentRepositories $studentRepositories ,
                              userRepositories $userRepositories ,
                              topicServices $topicServices)
    {
        $this->topicRepositories = $topicRepositories;
        $this->teacherRepositories = $teacherRepositories;
        $this->studentRepositories = $studentRepositories;
        $this->userRepositories = $userRepositories;

        $this->topicServices = $topicServices;
        $this->middleware('adminMiddleware',['only'=>['store','create']]);
    }

    //
//    public function store(Request $request)//post topic
//    {
//        //新增專題
//        $studentName = $request['student'];
//        $studentNo = $this->studentRepositories
//                          ->getStunoFromStuName($studentName);
//        $this->topicRepositories
//             ->insert($request['groupno']);
//
//    }

    public function update(Request $request)//put topic/{topic}
    {
        //編輯專題內容
        $this->topicRepositories
             ->edit($request['id'],$request['title'],$request['keyword'],
                    $request['type'],$request['lastdate'],$request['content'],
                    $request['video']);
    }

    public function updateinfo(Request $request)//put topic/{topic}/info
    {
        //編輯專題資訊
        $this->topicRepositories
            ->edit($request['id'],$request['title'],$request['keyword'],
                $request['type'],$request['lastdate'],$request['content'],
                $request['video']);
    }

    public function showTopic()
    {
        //顯示指定專題 頁面
        $groupNo = $this->userRepositories
                        ->getGroup(session('memID'));
        $topic = $this->topicRepositories
                      ->getTopicFromGroupNo($groupNo);
        return view('postmodify', ['topic' => $topic]);
    }

    public function create()// get topic/create
    {
        //新增專題 頁面
    }

    public function editTopicinfo()
    {
        //編輯專題資訊 頁面
        $topic = $this->topicRepositories
                      ->getFromId(session('memID'));
    }
    public function editTopiccontent()
    {
        //編輯內容 頁面
        $topic = $this->topicRepositories
            ->getFromId(session('memID'));
    }

    public function uploadPage()
    {

    }

    public function upload(Request $request)// post topic/{topic}/upload
    {
        //上傳檔案
        $file = $request->file('file');
        $groupno = $this->topicRepositories
                        ->getGroupno($request['id']);
        $isSuccess = $this->topicServices
                          ->upload($request['id'],$groupno,$file);

        return $isSuccess;
    }

    public function index()
    {
        //所有專題 頁面
        $topic = $this->topicRepositories
                      ->getAll();
    }

    public function teacherEdit()
    {
        //老師編輯 頁面
    }
}
