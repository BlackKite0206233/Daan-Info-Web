<?php

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
    //
    public function store(Request $request)// post scorelist
    {
        //新增評分項目
        $this->scoreRepositories
            ->insertScoreList($request['scorename'],$request['present']);

    }

    public function update(Request $request)// put scorelist/{scorelist}
    {
        //修改評分項目
        $this->scoreRepositories
            ->editScoreList($request['id'],$request['scorename'],$request['present']);
    }

    public function destroy(Request $request)// delete scorelist/{scorelist}
    {
        //移除評分項目
        $this->scoreRepositories
            ->deleteScoreList($request['id']);
    }

    public function index()// get scorelist
    {
        $scorelist = $this->scoreRepositories
                        ->getAll();

    }

    public function create()//get scorelist/create
    {

    }
}
