<?php
//老師的資料庫邏輯
namespace daan_info_web\Repositories;

use daan_info_web\User;

class teacherlistRepositories
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //取得指定姓名的老師
    public function getTeacherNo($teacherName)
    {
        $teacher = $this->user
                        ->where('name',$teacherName)
                        ->get();
        return $teacher;
    }

    //取得所有老師
    public function getTeacher()
    {
        return $this->user
                   ->where('category','t')
                   ->get();
    }

    //取得指定老師名稱
    public function getTeacherName($acc)
    {
        $teacher = $this->user
            ->where('acc',$acc)
            ->first();
        return $teacher->name;
    }
} 