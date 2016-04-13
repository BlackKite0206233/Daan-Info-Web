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
                //return view('index');
                session(['status'=>'student']);
            }
            else if(Auth::user()->acc == "admin")
            {
                //return view('index');
                session(['status'=>'admin']);
            }
            else
            {
                //return view('index');
                session(['status'=>'teacher']);
            }
        }
        else
        {
            //return 'loginFail';
            session(['status'=>'guest']);
        }

        return view('index');
    }

    public function logout()
    {
        //登出
        session(['status'=>'guest']);
        Auth::logout();
        return view('index');
    }

} 