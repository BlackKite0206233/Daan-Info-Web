<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class browseController extends Controller
{
    //
    public function Pagination()
    {
        //分頁顯示

    }

    public function searchPage()
    {
        //搜尋 頁面
    }

    public function search(Request $request)
    {
        //搜尋結果 頁面

    }

    public function year(Request $request)
    {
        //依年度顯示

    }

    public function topic(Request $request)
    {
        //顯示指定專題
    }

    public function teacherPage()
    {
        //老師開課資訊
    }

    public function teacher(Request $request)
    {
        //依老師顯示
    }
}
