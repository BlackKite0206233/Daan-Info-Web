<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use daan_info_web\Repositories\browseRepositories;
use daan_info_web\Presenters\browsePresenters;

use Crypt;

class browseController extends Controller
{
    protected $browseRepositories;
    protected $browsePresenters;

    public function __construct(browseRepositories $browseRepositories ,
                              browsePresenters $browsePresenters)
    {
        $this->browseRepositories = $browseRepositories;
        $this->browsePresenters = $browsePresenters;
    }
    //
    public function Pagination()
    {
        //分頁顯示
        $Pagination = $this->browseRepositories
                           ->Pagination();
        return view('list',['topic'=>$Pagination]);
    }

    public function search(Request $request)
    {
        //搜尋結果 頁面
        $searchResult = $this->browseRepositories
                             ->search($request['Search']);
        return view('searchResult',['topic'=>$searchResult]);
    }

    public function year($year ,Request $request)
    {
        //依年度顯示
        if($year != 'all')
            $Pagination = $this->browseRepositories
                               ->getTopicinfoFromYear($year);
        else
            $Pagination = $this->browseRepositories
                ->Pagination();
        if($Pagination != NULL)
            $data = $this->browsePresenters
                         ->brief($Pagination);
        else $data = "";
        return $data;
    }

    public function topic($topic,Request $request)
    {
        //顯示指定專題
        $Topic = $this->browseRepositories
                      ->getTopicFromGroupno($topic);

        return view('post',['topic'=>$Topic]);
    }

    public function teacherPage()
    {
        //老師開課資訊
        return view('teacher');
    }

    public function teacher($teacher,Request $request)
    {
        //依老師顯示
//        $acc = Crypt::decrypt($teacher);
        $topic = $this->browseRepositories
                      ->getTopicinfoFromTeacher($teacher);

        return view('searchResult',['topic'=>$topic]);

    }
}
