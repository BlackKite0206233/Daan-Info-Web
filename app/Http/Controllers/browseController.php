<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use daan_info_web\Repositories\browseRepositories;
use daan_info_web\Presenters\browsePresenters;


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
    public function Pagination()                                               //get browse/page
    {
        //分頁顯示專題
        $Pagination = $this->browseRepositories
                           ->Pagination();
        return view('list',['topic'=>$Pagination]);
    }

    public function search(Request $request)                                    //post browse/search
    {
        //搜尋結果 頁面
        $searchResult = $this->browseRepositories
                             ->search($request['Search']);
        return view('searchResult',['topic'=>$searchResult]);
    }

    public function year($year ,Request $request)                               //get browse/year/{year}
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
        else
            $data = "";
        return $data;
    }

    public function topic($topic,Request $request)                               //get browse/topic/{topic}
    {
        //顯示指定專題
        $Topic = $this->browseRepositories
                      ->getTopicFromGroupno($topic);

        return view('post',['topic'=>$Topic]);
    }

    public function teacherPage()                                                 //get browse/teacher
    {
        //老師開課資訊
        return view('teacher');
    }

    public function teacher($teacher,Request $request)                            //get browse/teacher/{teacher}
    {
        //依老師顯示
        $topic = $this->browseRepositories
                      ->getTopicinfoFromTeacher($teacher);

        return view('searchResult',['topic'=>$topic]);

    }
}
