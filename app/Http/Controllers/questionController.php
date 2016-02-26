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
        $this->questionRepositories
            ->insert($request['groupno'],$request['question']);
    }

    public function update(Request $request)
    {
        $this->questionRepositories
            ->update($request['id'],$request['question']);
    }

    public function destroy(Request $request)
    {
        $this->questionRepositories
            ->delete($request['id']);
    }

    public function create()
    {

    }

//    public function edit(Request $request)
//    {
//        $this->questionRepositories
//            ->getAll($request['groupno']);
//    }

    public function index(Request $request)
    {
        $question = $this->questionRepositories
                        ->getAll($request['groupno']);
    }

} 