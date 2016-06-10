<?php
//處理專題資訊的商業邏輯
namespace daan_info_web\Services;

use Auth;

use daan_info_web\Repositories\gradeinfoRepositories;
class gradeinfoServices {

    protected $gradeinfoRepositories;

    public function __construct(gradeinfoRepositories $gradeinfoRepositories)
    {
        $this->gradeinfoRepositories = $gradeinfoRepositories;
    }

    //顯示可編輯的專題資訊
    public function edit($year)
    {
        $teacher = session('memID');
        if($teacher == "admin")//系統管理員可編輯所有老師所有年度的專題資訊
        {
            //取得指定年度所有老師的專題資訊
            $this->gradeinfoRepositories
                ->getFromYear($year);
        }
        else//老師只能編輯自己最新年度的專題資訊
        {
            //取得指定老師的最新年度專題資訊
            $this->gradeinfoRepositories
                ->getFromTeacherAndLatestYear($teacher);
        }
    }
} 