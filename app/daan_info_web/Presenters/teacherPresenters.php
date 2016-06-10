<?php
//處理老師的顯示邏輯
namespace daan_info_web\Presenters;

use daan_info_web\Repositories\teacherlistRepositories;
use daan_info_web\Repositories\teacherRepositories;
use daan_info_web\Repositories\gradeinfoRepositories;

use Crypt;

class teacherPresenters {

    protected $teacherlistRepositories;
    protected $teacherRepositories;
    protected $gradeinfoRepositories;

    public function __construct(teacherlistRepositories $teacherlistRepositories ,
                              teacherRepositories $teacherRepositories ,
                              gradeinfoRepositories $gradeinfoRepositories)
    {
        $this->teacherlistRepositories = $teacherlistRepositories;
        $this->teacherRepositories = $teacherRepositories;
        $this->gradeinfoRepositories = $gradeinfoRepositories;
    }

    //顯示老師、開課資訊
    public function getTeacher()
    {
        //取得所有老師
        $Teacher = $this->teacherlistRepositories
                        ->getTeacher();
        $pic = array();
        $gradeinfo = array(array());

        //取得圖片、開課資訊、加上HTML標籤
        $result = "";
        foreach($Teacher as $key => $teacher)
        {
            //依老師帳號取得老師圖片
            $pic[$key] = $this->teacherRepositories
                            ->getPic($teacher->acc);

            //依老師帳號取得開課資訊
            $gradeinfo[$key] = $this->gradeinfoRepositories
                                    ->getFromTeacherAndLatestYear($teacher->acc);

            //加上HTML標籤
            $result .= '<div class="col-md-3" style="float:none;display:inline-block;">
                            <a href="teacher/' . $teacher->acc . '" style="text-decoration:none">
                                <img class="img-circle" src="' . asset($pic[$key]) . '" alt="Generic placeholder image" style="width:280px;height:280px">
                                <h4 style="font-weight:bold;margin:15px;">' . $teacher->name . '</h4>
                                <h5 style="margin-top:-15px;color:rgb(181, 181, 181);">' . $gradeinfo[$key]['content'] . '</h5>
                            </a>
                        </div>';
        }
        return $result;
    }
} 