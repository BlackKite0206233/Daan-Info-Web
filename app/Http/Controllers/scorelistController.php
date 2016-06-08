<?php
//管理評分項目
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use daan_info_web\Repositories\scoreRepositories;

class scorelistController extends Controller
{
    protected $scoreRepositories;

    public function __construct(scoreRepositories $scoreRepositories)
    {
        $this->scoreRepositories = $scoreRepositories;
    }

    //新增評分項目
    public function store(Request $request)                                                             //post scorelist
    {
        //在scorelist資料表新增一筆資料(評分項目名稱、比例)
        $this->scoreRepositories
             ->insertScoreList($request['scorename'],$request['present']);

    }

    //修改評分項目
    public function update(Request $request)                                                            //put scorelist/{scorelist}
    {
        //更新評分項目(評分項目名稱、比例)
        $this->scoreRepositories
             ->editScoreList($request['id'],$request['scorename'],$request['present']);
    }

    //移除評分項目
    public function destroy(Request $request)                                                           //delete scorelist/{scorelist}
    {
        //刪除評分項目
        $this->scoreRepositories
             ->deleteScoreList($request['id']);
    }

    //編輯、刪除評分項目 頁面
    public function index()                                                                             //get scorelist
    {
        //取得所有評分項目
        $scorelist = $this->scoreRepositories
                          ->getAll();

    }

    //新增評分項目 頁面
    public function create()                                                                            //get scorelist/create
    {

    }
}
