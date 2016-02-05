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
}