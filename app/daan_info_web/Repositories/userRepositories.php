<?php
//user的資料庫邏輯
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

    //新增成員
    public function insert($acc ,$password ,$name ,$category )
    {
        $member = new User;
        $member->acc = $acc;
        $member->password = Hash::make($password);
        $member->name = $name;
        $member->category = $category;
        $member->save();

    }

    //更新密碼
    public function edit($id ,$password)
    {
        //編輯
        $this->user
             ->where('idno' ,$id)
             ->update(['password' => Hash::make($password)]);

        return true;
    }

    //取得特定使用者密碼
    public function getPwd($id)
    {
        $pwd =  $this->user
                     ->where('idno' ,$id)
                     ->first();
        return $pwd->password;
    }

}