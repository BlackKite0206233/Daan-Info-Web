<?php

namespace daan_info_web\Repositories;

use Hush;
use Auth;

use daan_info_web\User;
use daan_info_web\Student;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Support\Facades\Auth;


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
        if(Auth::attempt(['acc'=>$acc,'password'=>$password]))
        {
            if(Auth::user()->category == "s")
                return 1;
            else
                return 2;
        }
        else
            return 0;
    }

    public function logout()
    {
        //登出
        Auth::logout();
    }

    public function insert($acc ,$acc_id ,$password ,$memberNo ,$category ,$stuName)
    {
        //新增
        $member = new User;
        $member->acc = $acc;
        $member->acc_id = $acc_id;
        $member->password = Hash::make($password);
        $member->memberNo = $memberNo;
        $member->category = $category;
        $member->save();

        if($category == "s")
        {
            $stu = new Student;
            $stu->stuno = $acc_id;
            $stu->stuname = $stuName;
            $stu->save();
        }

    }

    public function edit($id  ,$password)
    {
        //編輯
        $this->user
            ->where('id' ,$id)
            ->update(['password' => Hash::make($password)]);
    }

    public function delete($id)
    {
        //刪除
        $acc_id = $this->user
                        ->where('id',$id)
                        ->get('acc_id');
        $this->user
            ->where('id',$id)
            ->delete();
        $this->student
            ->where('stuno',$acc_id)
            ->delete();
    }

    public function all()
    {
        //回傳所有學生
        return $this->student->get();
    }

    public function year($year)
    {
        //回傳指定年度
        return $this->student
                    ->where('stuno','like',$year.'%')
                    ->get();
    }
}