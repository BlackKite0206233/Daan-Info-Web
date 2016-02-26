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

    public function insert($acc_id,$name)
    {
        $stu = new Student;
        $stu->acc_id = $acc_id;
        $stu->name = $name;
        $stu->save();
    }

    public function getAll()
    {
        return $this->student
                    ->get();
    }

    public function getYear($year)
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
