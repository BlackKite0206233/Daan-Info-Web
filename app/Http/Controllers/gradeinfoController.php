<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use daan_info_web\Repositories\gradeinfoRepositories;
use daan_info_web\Repositories\teacherlistRepositories;

use daan_info_web\Services\gradeinfoServices;

use Auth;

class gradeinfoController extends Controller
{
    protected $gradeinfoRepositories;
    protected $teacherlistRepositories;
    protected $gradeinfoServices;

    public function __construct(gradeinfoRepositories $gradeinfoRepositories,
                                teacherlistRepositories $teacherlistRepositories,
                                gradeinfoServices $gradeinfoServices)
    {
        $this->gradeinfoRepositories = $gradeinfoRepositories;
        $this->teacherlistRepositories = $teacherlistRepositories;
        $this->gradeinfoServices = $gradeinfoServices;
    }
    //
    public function store(Request $request)//post gradeinfo
    {
        //新增課程資訊
        $teacherno = $this->teacherlistRepositories
                            ->getTeacherNo($request['teacher']);
        $this->gradeinfoRepositories
            ->insert($request['gradeno'],$teacherno,$request['content']);
    }

    public function update(Request $request)//put gradeinfo/{gradeinfo}
    {
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
        $this->gradeinfoServices
                ->edit($request['year']);
    }

}
