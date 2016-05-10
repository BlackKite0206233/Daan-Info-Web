<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use daan_info_web\Repositories\stuscoreRepositories;

class scoreController extends Controller
{
    protected $stuscoreRepositories;

    public function __construct(stuscoreRepositories $stuscoreRepositories)
    {
        $this->stuscoreRepositories = $stuscoreRepositories;
    }

    public function update(Request $request)// put score/{score}
    {
        //修改評分
        $this->stuscoreRepositories
             ->edit($request['score']);
    }

    public function index()// get score
    {

    }

    public function edit(Request $request)// get score/{score}/edit
    {

    }


}
