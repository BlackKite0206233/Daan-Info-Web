<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use daan_info_web\Repositories\browseRepositories;

class browseController extends Controller
{
    protected $browseRepositories;

    public function __construct(browseRepositories $browseRepositories)
    {
        $this->browseRepositories = $browseRepositories;
    }
    //
    public function Pagination()
    {
        //分頁顯示
        $Pagination = $this->browseRepositories->Pagination();
        return view('list');
    }

//    public function searchPage()
//    {
//        //搜尋 頁面
//    }

    public function search(Request $request)
    {
        //搜尋結果 頁面
        $searchResult = $this->browseRepositories->search($request['searchWord']);
        return redirect('');
    }

    public function year($year,Request $request)
    {
        //依年度顯示

    }

    public function topic($topic,Request $request)
    {
        //顯示指定專題
    }

    public function teacherPage()
    {
        //老師開課資訊
        return view('teacher');
    }

    public function teacher($teacher,Request $request)
    {
        //依老師顯示
    }
}
