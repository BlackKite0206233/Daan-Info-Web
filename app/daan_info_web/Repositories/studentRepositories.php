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
}
