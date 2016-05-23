<?php

namespace daan_info_web\Repositories;

use Hash;
use daan_info_web\User;
use daan_info_web\Student;
use daan_info_web\Stuscoore;


class userRepositories
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function insert($acc ,$password ,$name ,$category ,$groupno)
    {
        //新增
        $member = new User;
        $member->acc = $acc;
        //$member->acc_id = $acc_id;
        $member->password = Hash::make($password);
        $member->name = $name;
        $member->category = $category;
        $member->groupno = $groupno;
        $member->save();

    }

    public function edit($id  ,$password)
    {
        //編輯
        $this->user
             ->where('idno' ,$id)
             ->update(['password' => Hash::make($password)]);
    }

    public function getPwd($id)
    {
        return $this->user
                   ->where('idno' ,$id)
                   ->get('password');
    }

}