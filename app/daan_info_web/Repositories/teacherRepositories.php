<?php

namespace daan_info_web\Repositories;

use daan_info_web\User;

class teacherRepositories
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

//    public function insert($groupno,$teacherno)
//    {
//        $Teacher = new Teacher;
//        $Teacher->groupno = $groupno;
//        $Teacher->teacher = $teacherno;
//        $Teacher->save();
//    }

    public function getFromYear($year)
    {
        return $this->user
                   ->where('groupno','like','%'.$year.'%')
                   ->get();
    }

    public function getFromTeacherAndYear($teacher,$year)
    {

    }
}