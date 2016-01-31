<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Repositories\gradeinfoRepositories;

class gradeinfoController extends Controller
{
    protected $gradeinfoRepositores;

    public function __construct(gradeinfoRepositories $gradeinfoRepositories)
    {
        $this->gradeinfoRepositores = $gradeinfoRepositories;
    }
    //
    public function store(Request $request)//post gradeinfo
    {
        //新增課程資訊
        $this->gradeinfoRepositores
            ->insert($request['gradeno'],$request['teacherno'],$request['content']);
    }

    public function update(Request $request)//put gradeinfo/{gradeinfo}
    {
        //編輯課程資訊
        $this->gradeinfoRepositores
            ->edit($request);
    }

    public function destroy(Request $request)// delete gradeinfo/{gradeinfo}
    {
        //刪除課程資訊
        $this->gradeinfoRepositores
            ->delete($request['id']);

    }

    public function index()// get gradeinfo/
    {

    }

    public function create()// get gradeinfo/create
    {

    }

    public function edit()// get gradeinfo/{gradeinfo}/edit
    {

    }
}
