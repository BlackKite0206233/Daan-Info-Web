<?php

namespace daan_info_web\Repositories;

use daan_info_web\User;

class studentRepositories
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user
                   ->where('category','s')
                   ->get();
    }

    public function getFromYear($year)
    {
        return $this->user
                   ->where('category','s')
                   ->where('stuno' , 'like' ,'%'.$year.'%')
                   ->get();
    }

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
