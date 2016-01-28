<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class gradeinfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','teacher']]);
    }
    //
    public function store(Request $request)//post gradeinfo
    {
        //新增課程資訊

    }

    public function update(Request $request)//put gradeinfo/{gradeinfo}
    {
        //編輯課程資訊

    }

    public function destroy(Request $request)// delete gradeinfo/{gradeinfo}
    {
        //刪除課程資訊

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

    public function teacher(Request $request)
    {

    }
}
