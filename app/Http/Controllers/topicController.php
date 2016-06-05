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

    public function update($topic,Request $request)                                          //put topic/{topic}
    {
        //編輯專題內容
        $content = $request['editor1']."#spilt#".$request['editor2'];

        $memPic = $request->file('memPic');
        $strPic = $request->file('strPic');
        $proPic = $request->file('proPic');

        $this->topicRepositories
             ->editcontent($topic,$content,$request['video']);


        return view('postmodify', ['topic' => $topic]);
    }

    public function updateinfo($topic,Request $request)                                      //put topic/{topic}/info
    {
        //編輯專題資訊

        $file = $request->file('pic');

        $this->topicRepositories
             ->edit($topic,$request['title'],$request['keyword'],$request['type']);


        return view('postmodify', ['topic' => $topic]);
    }

    public function showTopic()                                                               //get topic/showTopic
    {
        //顯示指定專題 頁面
        $groupNo = $this->userRepositories
                        ->getGroup(session('memID'));
        $topic = $this->topicRepositories
                      ->getTopicFromGroupNo($groupNo);
        return view('postmodify', ['topic' => $topic]);
    }

    public function create()                                                                  //get topic/create
    {
        //新增專題 頁面
    }

    public function upload($topic,Request $request)                                           //post topic/{topic}/upload
    {
        //上傳檔案
        $ppt = $request->file('ppt');
        $pdf = $request->file('pdf');
        $data = $request->file('data');

        $isSuccessPPT = $this->topicServices
                          ->upload($topic,$ppt,['ppt','pptx','pps','ppsx'],'info');
        $isSuccessPDF = $this->topicServices
                          ->upload($topic,$pdf,['pdf'],'info');
        $isSuccessDATA = $this->topicServices
                          ->upload($topic,$data,['7z','rar','zip','apk','exe'],'info');

        return view('postmodify', ['topic' => $topic])->with($isSuccessPPT,$isSuccessPDF,$isSuccessDATA);
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
