<?php
//處理控制列的顯示邏輯
namespace daan_info_web\Presenters;


class ctrlbarPresenter
{
    //標題列顯示內容
    public function ctrlbar($status,$memID)
    {
        $bar = '';
        if($status != 'guest' && $status != NULL)
        {
            if($status == 'student')//學生登入時顯示
                $bar .= '<li><a href="/topic/showTopic" style="color:white;">我的專題</a></li>';
            else
            {
                if($status == 'admin')//系統館裡員登入時顯示(內容還沒確定)
                {

                }
                //老師登入時顯示(內容還沒確定)
            }
                $bar .= '<li><a href="/changePwd" style="color:white;">修改密碼</a></li>';//登入就顯示
        }

        return $bar;
    }

    //登入、登出按鈕選擇
    public function loginOrLogout($status)
    {
        $bar = '';
        if($status == NULL || $status == 'guest')//未登入或狀態為guest時顯示 登入
            $bar = '<a href="/login" style="color:white;"><img src="'.asset('img/login.png').'"></a>';
        else//登入後顯示 登出
            $bar = '<a href="/logout" style="color:white;">登出</a>';

        return $bar;
    }
} 