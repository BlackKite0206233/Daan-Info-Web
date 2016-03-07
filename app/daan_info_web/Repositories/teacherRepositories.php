<?php

namespace daan_info_web\Repositories;

use daan_info_web\Teacher;

class teacherRepositories
{
    protected $teacher;

    public function __construct(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    public function insert($groupno,$teacherno)
    {
        $Teacher = new Teacher;
        $Teacher->groupno = $groupno;
        $Teacher->teacher = $teacherno;
        $Teacher->save();
    }

    public function getFromYear($year)
    {
        return $this->teacher
                    ->where('group','like','%'.$year.'%')
                    ->get();
    }

    public function getFromTeacherAndYear($teacher,$year)
    {

    }
}