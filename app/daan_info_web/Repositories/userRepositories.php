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

    public function insert($acc ,$password ,$name ,$category )
    {
        //新增
        $member = new User;
        $member->acc = $acc;
        $member->password = Hash::make($password);
        $member->name = $name;
        $member->category = $category;
        $member->save();

    }

    public function edit($id ,$password)
    {
        //編輯
        $this->user
             ->where('idno' ,$id)
             ->update(['password' => Hash::make($password)]);

        return true;
    }

    public function getPwd($id)
    {
        $pwd =  $this->user
                     ->where('idno' ,$id)
                     ->first();
        return $pwd->password;
    }

    public function getGroup($id)
    {
        $group = $this->user
                      ->where('idno' ,$id)
                      ->first();
        return $group->topicgroup;
    }

    public function getTeacher($acc)
    {
        $teacher = $this->user
                        ->where('acc',$acc)
                        ->first();
        return $teacher->name;
    }

    public function getStudent($groupno)
    {
        $student = $this->user
                        ->where('topicgroup',$groupno)
                        ->get();
        return $student;
    }


}