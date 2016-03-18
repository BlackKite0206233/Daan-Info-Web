<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Repositories\topicRepositories;
use daan_info_web\Repositories\topicgroupRepositories;
use daan_info_web\Repositories\teacherRepositories;
use daan_info_web\Repositories\studentRepositories;

use daan_info_web\Services\topicServices;

class topicController extends Controller
{
    protected $topicRepositories;
    protected $topicgroupRepositories;
    protected $teacherRepositories;
    protected $studentRepositories;

    protected $topicServices;

    public function __construct(topicRepositories $topicRepositories,
                                topicgroupRepositories $topicgroupRepositories,
                                teacherRepositories $teacherRepositories,
                                studentRepositories $studentRepositories,
                                topicServices $topicServices)
    {
        $this->topicRepositories = $topicRepositories;
        $this->topicgroupRepositories = $topicgroupRepositories;
        $this->teacherRepositories = $teacherRepositories;
        $this->studentRepositories = $studentRepositories;

        $this->topicServices = $topicServices;
        $this->middleware('adminMiddleware',['only'=>['store','create']]);
    }

    //
    public function store(Request $request)//post topic
    {
        //新增專題
        $studentName = $request['student'];
        $studentNo = $this->studentRepositories
                        ->getFromStuNo($studentName);
        $this->topicRepositories
            ->insert($request['groupno']);
        $this->topicgroupRepositories
            ->insert($request['groupno'],$studentNo);
        $this->teacherRepositories
            ->insert($request['groupno'],$request['teacher']);
//        $this->topicRepositories
//            ->insert($request['groupno']);

    }

    public function update(Request $request)//put topic/{topic}
    {
        //編輯專題
        $this->topicRepositories
            ->edit($request['id'],$request['title'],$request['keyword'],
                    $request['type'],$request['lastdate'],$request['content'],
                    $request['wmv']);
    }

    public function show(Request $request)// get topic/{topic}
    {
        //顯示指定專題 頁面
        $topic = $this->topicRepositories
                        ->getFromId($request['id']);
    }

    public function create()// get topic/create
    {
        //新增專題 頁面
    }

    public function edit(Request $request)// get topic/{topic}/edit
    {
        //編輯專題 頁面
        $topic = $this->topicRepositories
                        ->getFromId($request['id']);
    }

    public function upload(Request $request)// get topic/{topic}/upload
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
