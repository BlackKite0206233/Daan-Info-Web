<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2016/3/10
 * Time: 上午 11:51
 */

namespace daan_info_web\Services;

use Auth;

use daan_info_web\User;

class loginServices {

    public function login($acc ,$password)
    {
        //登入
        if(Auth::attempt(['acc'=>$acc,'password'=>$password]))
        {
            if(Auth::user()->category == "s")
            {
                return 'student';
            }
            else if(Auth::user()->acc == "admin")
            {
                return 'admin';
            }
            else
            {
                return 'teacher';
            }
        }
        else
        {
            return 'loginFail';
        }
    }

    public function logout()
    {
        //登出
        Auth::logout();
    }

} 