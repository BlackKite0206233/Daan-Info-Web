<?php

namespace daan_info_web\Repositories;

use daan_info_web\Student;

class studentRepositories
{
    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function all()
    {
        return $this->student
                    ->get();
    }

    public function year($year)
    {
        return $this->student
                    ->where('stuno' , 'like' ,$year.'%')
                    ->get();
    }

    public function getStuNo($student)
    {
        $stuNo = Array(5);
        $i = 0;

        foreach($student as $stu)
        {
            $no = $this->student
                        ->where('stuname' , $stu)
                        ->get();
            $stuNo[$i] = $no->stuno;
            $i++;
        }

        return $stuNo;
    }
}
