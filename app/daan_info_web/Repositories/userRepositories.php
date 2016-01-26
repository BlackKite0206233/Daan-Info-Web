<?php

namespace daan_info_web\Repositories;

use daan_info_web\User;

class userRepositories
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login($acc ,$password)
    {
        //登入
    }

    public function logout($acc)
    {
        //登出
    }

    public function insert($acc ,$acc_id ,$password ,$memberNo ,$category)
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