<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Repositories\gradeinfoRepositories;

use daan_info_web\Services\gradeinfoServices;

use Auth;

class gradeinfoController extends Controller
{
    protected $gradeinfoRepositories;
    protected $gradeinfoServices;

    public function __construct(gradeinfoRepositories $gradeinfoRepositories,
                                gradeinfoServices $gradeinfoServices)
    {
        $this->gradeinfoRepositories = $gradeinfoRepositories;
        $this->gradeinfoServices = $gradeinfoServices;
    }
    //
    public function store(Request $request)//post gradeinfo
    {
        //新增課程資訊
        $this->gradeinfoRepositories
            ->insert($request['gradeno'],$request['teacherno'],$request['content']);
    }

    public function update(Request $request)//put gradeinfo/{gradeinfo}
    {
        //編輯課程資訊
//        $gradeinfo = $this->gradeinfoServices
//                            ->encode($request);
        $this->gradeinfoRepositories
            ->edit($request['gradeinfo']);
    }

    public function destroy(Request $request)// delete gradeinfo/{gradeinfo}
    {
        //刪除課程資訊
        $this->gradeinfoRepositories
            ->delete($request['id']);

    }

    public function index()// get gradeinfo/
    {

    }

    public function create()// get gradeinfo/create
    {

    }

    public function edit(Request $request)// get gradeinfo/{gradeinfo}/edit
    {
        $teacher = Auth::user();
        if($teacher->acc == "admin")
            $this->gradeinfoRepositories
                ->getAll($request['year']);
        else
            $this->gradeinfoRepositories
                ->getTeacher($teacher->memberno,$request['year']);
    }
}
