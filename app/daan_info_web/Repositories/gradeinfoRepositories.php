<?php

namespace daan_info_web\Repositories;

use daan_info_web\Gradeinfo;

class gradeinfoRepositories
{
    protected $gradeinfo;

    public function __construct(Gradeinfo $gradeinfo)
    {
        $this->gradeinfo = $gradeinfo;
    }

    public function insert($gradeNo ,$teacherNo ,$content)
    {
        //新增
    }

    public function edit($id  ,$gradeNo ,$teacherNo ,$content)
    {
        //編輯
    }

    public function delete($id)
    {
        //刪除
    }
}