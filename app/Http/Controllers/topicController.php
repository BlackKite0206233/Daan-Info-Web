<?php
//管理專題
namespace App\Http\Controllers;

use daan_info_web\Services\uploadFactoryFunction\topicinfoFactory;
use daan_info_web\Services\uploadFactoryFunction\topicpicFactory;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Repositories\topicRepositories;
use daan_info_web\Repositories\teacherRepositories;
use daan_info_web\Repositories\studentRepositories;
use daan_info_web\Repositories\userRepositories;
use daan_info_web\Repositories\topicpicRepositories;
use daan_info_web\Repositories\questionRepositories;

use daan_info_web\Services\topicServices;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class topicController extends Controller
{
    protected $topicRepositories;
    protected $teacherRepositories;
    protected $studentRepositories;
    protected $userRepositories;
    protected $topicpicRepositories;
    protected $questionRepositories;

    protected $topicServices;

    protected $topicinfoFactory;
    protected $topicpicFactory;

    public function __construct(topicRepositories $topicRepositories ,
                               teacherRepositories $teacherRepositories ,
                               studentRepositories $studentRepositories ,
                               userRepositories $userRepositories ,
                               topicpicRepositories $topicpicRepositories ,
                               topicServices $topicServices ,
                               topicinfoFactory $topicinfoFactory ,
                               topicpicFactory $topicpicFactory ,
                               questionRepositories $questionRepositories)
    {
        $this->topicRepositories = $topicRepositories;
        $this->teacherRepositories = $teacherRepositories;
        $this->studentRepositories = $studentRepositories;
        $this->userRepositories = $userRepositories;
        $this->topicpicRepositories = $topicpicRepositories;
        $this->questionRepositories = $questionRepositories;

        $this->topicServices = $topicServices;

        $this->topicinfoFactory = $topicinfoFactory;
        $this->topicpicFactory = $topicpicFactory;
    }

    //新增專題(第一次登入才會出現)
    public function store(Request $request)                                                  //post topic
    {
        $studentName = $request['student'];

        //user資料表增加組別編號
        $this->studentRepositories
             ->setGroupNo($request['groupno'],$studentName);

        //topicinfo資料表新增一筆資料(組別編號、指導老師、標題)
        $this->topicRepositories
             ->insert($request['groupno'],$request['teacher'],$request['title']);

        //topicpic資料表新增一筆資料(組別編號)
        $this->topicpicRepositories
             ->insert($request['groupno']);

        $this->questionRepositories
             ->insert($request['groupno']);

        return redirect('topic/showTopic'); //重新導向到自己的專題
    }

    //編輯專題內容
    public function update($topic,Request $request)                                          //put topic/{topic}
    {
        //動機 跟 遇到的問題與解決辦法 用 #split# 隔開，放在同一個欄位
        $content = $request['editor1']."#split#".$request['editor2'];

        //取得指定專題詳細資料(目的是取得原本上傳的檔案名稱)
        $path = $this->topicRepositories
                     ->getTopicFromGroupNo($topic);

        $memPic = $request->file('memPic');//組員照片
        $strPic = $request->file('strPic');//系統架構圖
        $proPic = $request->file('proPic');//成品照片

        //上傳照片(工廠方法模式  選擇topicpicFactory)
        $factory = $this->topicpicFactory;

        $pic = $factory->selectDB();
        $pic->groupno = $topic;//設定組別編號
        $pic->setRule(['jpg','png','gif']);//設定允許的附檔名

        $pic->field = 'memberpic';//設定存取的欄位名稱(下同)
        if($memPic != NULL)
            $pic->uploadFile($memPic,$path->memberpic);//上傳(下同)

        $pic->field = 'structurepic';
        if($strPic != NULL)
            $pic->uploadFile($strPic,$path->structurepic);

        $pic->field = 'productpic';
        if($proPic != NULL)
            $pic->uploadFile($proPic,$path->productpic);

        //更新topicinfo的資料(內容、影片)
        $this->topicRepositories
             ->editcontent($topic,$content,$request['video']);


        return redirect('topic/showTopic');//重新導向到自己的專題
    }

    //編輯專題資訊
    public function updateinfo($topic,Request $request)                                      //put topic/{topic}/info
    {
        //取得指定專題詳細資料(目的是取得原本上傳的檔案名稱)
        $path = $this->topicRepositories
                     ->getTopicFromGroupNo($topic);

        $pic = $request->file('pic');//專題照片

        //上傳照片(工廠方法模式  選擇topicinfoFactory)
        $factory = $this->topicinfoFactory;

        $file = $factory->selectDB();
        $file->groupno = $topic;//設定組別編號
        $file->setRule(['jpg','png','gif']);//設定允許的附檔名
        $file->field = 'pic';//設定存取的欄位名稱

        if($pic != NULL)
            $file->uploadFile($pic,$path->pic);//上傳

        //更新topicinfo的資料(標題、關鍵字、類別)
        $this->topicRepositories
             ->edit($topic,$request['topicname'],$request['topickeyword'],$request['topictype']);


        return redirect('topic/showTopic');//重新導向到自己的專題
    }

    //顯示指定專題 頁面
    public function showTopic()                                                               //get topic/showTopic
    {
        //依學生編號取得組別編號
        $groupNo = $this->studentRepositories
                        ->getGroup(session('memID'));

        //依組別編號取得專題詳細資訊
        $topic = $this->topicRepositories
                      ->getTopicFromGroupNo($groupNo);

        return view('postmodify', ['topic' => $topic]);
    }

    //新增專題 頁面
    public function create()                                                                  //get topic/create
    {
        return view('createTopic');
    }

    //上傳檔案
    public function upload($topic,Request $request)                                           //post topic/{topic}/upload
    {
        //取得指定專題詳細資料(目的是取得原本上傳的檔案名稱)
        $path = $this->topicRepositories
                     ->getTopicFromGroupNo($topic);

        $ppt = $request->file('ppt');//簡報
        $pdf = $request->file('pdf');//報告
        $data = $request->file('data');//檔案

        //上傳檔案(工廠方法模式  選擇topicinfoFactory)
        $factory = $this->topicinfoFactory;

        $file = $factory->selectDB();
        $file->groupno = $topic;//設定組別編號

        $file->setRule(['ppt','pptx','pps','ppsx']);//設定允許的附檔名(下同)
        $file->field = 'ppt';//設定存取的欄位名稱(下同)
        if($ppt != NULL)
            $file->uploadFile($ppt,$path->ppt);//上傳(下同)

        $file->setRule(['pdf']);
        $file->field = 'pdf';
        if($pdf != NULL)
            $file->uploadFile($pdf,$path->pdf);

        $file->setRule(['7z','zip','rar','exe','apk']);
        $file->field = 'data';
        if($data != NULL)
            $file->uploadFile($data,$path->data);

        return redirect('topic/showTopic');//重新導向到自己的專題
    }

    //所有專題 頁面
    public function index()
    {
        //取得所有的專題
        $topic = $this->topicRepositories
                      ->getAll();
    }

    //老師編輯 頁面
    public function teacherEdit()
    {

    }
}
