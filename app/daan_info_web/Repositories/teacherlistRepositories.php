<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2016/2/3
 * Time: 下午 09:45
 */

namespace daan_info_web\Repositories;

use daan_info_web\User;

class teacherlistRepositories
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getTeacherNo($teacherName)
    {
        $teacher = $this->user
                        ->where('name',$teacherName)
                        ->get();
        return $teacher;
    }

    public function getTeacher()
    {
        return $this->user
                   ->where('category','t')
                   ->get();
    }
} 