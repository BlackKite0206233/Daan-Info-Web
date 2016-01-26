<?php

namespace daan_info_web\Repositories;

use daan_info_web\User;
use daan_info_web\Student;


class userRepositories
{
    protected $user;
    protected $student;

    public function __construct(User $user ,Student $student)
    {
        $this->user = $user;
        $this->student = $student;
    }

    public function login($acc ,$password)
    {
        //登入
    }

    public function logout($acc)
    {
        //登出
    }

    public function insert($acc ,$acc_id ,$password ,$memberNo ,$category ,$stuName)
    {
        //新增
    }

    public function edit($id  ,$password)
    {
        //編輯
    }

    public function delete($id)
    {
        //刪除
    }
}