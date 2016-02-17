<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Repositories\topicRepositories;
use daan_info_web\Repositories\topicgroupRepositories;
use daan_info_web\Repositories\teacherRepositories;

use daan_info_web\Services\topicServices;

class topicController extends Controller
{
    protected $topicRepositories;
    protected $topicgroupRepositories;
    protected $teacherRepositories;
    protected $topicServices;

    public function __construct(topicRepositories $topicRepositories,
                                topicgroupRepositories $topicgroupRepositories,
                                teacherRepositories $teacherRepositories,
                                topicServices $topicServices)
    {
        $this->topicRepositories = $topicRepositories;
        $this->topicgroupRepositories = $topicgroupRepositories;
        $this->teacherRepositories = $teacherRepositories;
        $this->topicServices = $topicServices;
        $this->middleware('adminMiddleware',['only'=>['store','create']]);
    }

    //
    public function store(Request $request)//post topic
    {
        //新增專題
        $this->topicRepositories
            ->insert($request['groupno']);
        $this->topicgroupRepositories
            ->insert($request['groupno'],$student);
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


//    public function destroy(Request $request)// delete topic/{topic}
//    {
//        //刪除專題
//        $this->topicRepositories
//            ->delete($request['id']);
//    }

    public function show(Request $request)// get topic/{topic}
    {
        $topic = $this->topicRepositories
                        ->one($request['id']);
    }

    public function create()// get topic/create
    {

    }

    public function edit(Request $request)// get topic/{topic}/edit
    {
        $topic = $this->topicRepositories
                        ->one($request['id']);
    }

    public function upload(Request $request)// get topic/{topic}/upload
    {
        $file = $request->file('file');
        $groupno = $this->topicRepositories
                        ->getGroupno($request['id']);
        $this->topicServices
            ->upload($request['id'],$groupno,$file);

    }

    public function index()
    {
        $topic = $this->topicRepositories
                        ->all();
    }
}
