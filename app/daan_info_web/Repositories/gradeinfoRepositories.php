<?php
//Gradeinfo的資料庫邏輯
namespace daan_info_web\Repositories;

use daan_info_web\Gradeinfo;

class gradeinfoRepositories
{
    protected $gradeinfo;

    public function __construct(Gradeinfo $gradeinfo)
    {
        $this->gradeinfo = $gradeinfo;
    }

    //新增開課資訊
    public function insert($gradeNo ,$teacherNo ,$content)
    {
        $info = new Gradeinfo;
        $info->gradeno = $gradeNo;
        $info->teacherno = $teacherNo;
        $info->content = $content;
        $info->save();
    }

    //編輯開課資訊(還沒寫完)
    public function edit($gradeinfo)
    {
        foreach($gradeinfo as $grade)
        {
            $this->gradeinfo
                 ->where('idno', $grade->id)
                 ->update(['content'=>$grade->content]);
        }
    }

    //刪除開課資訊
    public function delete($id)
    {
        $this->gradeinfo
             ->where('idno',$id)
             ->delete();
    }

    //取得指定年度開課資訊
    public function getFromYear($year)
    {
        return $this->gradeinfo
                   ->where('gradeno',$year)
                   ->get();
    }

    //取得指定老師的最新年度開課資訊
    public function getFromTeacherAndLatestYear($teacherno)
    {
        $year = $this->gradeinfo
                     ->max('gradeno');
        $gradeinfo = $this->gradeinfo
                          ->where('teacherno',$teacherno)
                          ->where('gradeno',$year)
                          ->first();
        if($gradeinfo != Null)
            return ['year'=>$year,'content'=>$gradeinfo->content];
        else
            return 0;
    }


}