<?php
//學生的資料邏輯
namespace daan_info_web\Repositories;

use daan_info_web\User;

class studentRepositories
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //取得所有學生
    public function getAll()
    {
        return $this->user
                   ->where('category','s')
                   ->get();
    }

    //取得指定年度的學生
    public function getFromYear($year)
    {
        return $this->user
                   ->where('category','s')
                   ->where('stuno' , 'like' ,'%'.$year.'%')
                   ->get();
    }

    //取得指定姓名的學生帳號(不知道要幹嘛??)
    public function getStunoFromStuName($student)//?
    {
        $stuNo = Array(5);
        $i = 0;

        foreach($student as $stu)
        {
            $no = $this->user
                       ->where('stuname' , $stu)
                       ->get();
            $stuNo[$i] = $no->acc;
            $i++;
        }

        return $stuNo;
    }

    //設定學生的專題編號
    public function setGroupNo($groupno,$StudentsName)
    {
        foreach($StudentsName as $stuname)
        {
            $this->user
                 ->where('name',$stuname)
                 ->update(['topicgroup'=>$groupno]);
        }
    }
}
