<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2016/2/26
 * Time: 上午 11:27
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use daan_info_web\Repositories\questionRepositories;


class questionController {

    protected $questionRepositories;

    public function __construct(questionRepositories $questionRepositories)
    {
        $this->questionRepositories = $questionRepositories;
    }

    public function store(Request $request)
    {
        //新增問題
        $this->questionRepositories
            ->insert($request['groupno'],$request['question']);
    }

    public function update(Request $request)
    {
        //編輯問題
        $this->questionRepositories
            ->update($request['id'],$request['question']);
    }

    public function create()
    {
        //新增問題 頁面
    }

    public function index(Request $request)
    {
        //編輯、刪除問題 頁面
        $question = $this->questionRepositories
                        ->getQuestionFromGroupno($request['groupno']);
    }

} 