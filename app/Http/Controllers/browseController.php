<?php
//顯示專題
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

    //分頁顯示專題
    public function Pagination()                                               //get browse/page
    {
        //取得所有專題
        $Pagination = $this->browseRepositories
                           ->Pagination();
        return view('list',['topic'=>$Pagination]);
    }

    //依專題名稱搜尋專題(糢糊搜尋)
    public function search(Request $request)                                    //post browse/search
    {
        //取得搜尋的專題
        $searchResult = $this->browseRepositories
                             ->search($request['Search']);
        return view('searchResult',['topic'=>$searchResult]);
    }

    //依年度顯示專題(用ajax)
    public function year($year)                                                 //get browse/year/{year}
    {

        if($year != 'all')//搜尋指定年度專題
            $Pagination = $this->browseRepositories
                               ->getTopicinfoFromYear($year);
        else//取得所有專題
            $Pagination = $this->browseRepositories
                ->Pagination();

        if($Pagination != NULL)
            $data = $this->browsePresenters
                         ->brief($Pagination);
        else
            $data = "";
        return $data;
    }

    //顯示指定專題
    public function topic($topic)                                                 //get browse/topic/{topic}
    {
        //取得指定專題
        $Topic = $this->browseRepositories
                      ->getTopicFromGroupno($topic);

        return view('post',['topic'=>$Topic]);
    }

    //老師開課資訊
    public function teacherPage()                                                 //get browse/teacher
    {
        return view('teacher');
    }

    //依老師顯示專題
    public function teacher($teacher,Request $request)                            //get browse/teacher/{teacher}
    {
        //取得指定老師專題
        $topic = $this->browseRepositories
                      ->getTopicinfoFromTeacher($teacher);

        return view('searchResult',['topic'=>$topic]);

    }
}
