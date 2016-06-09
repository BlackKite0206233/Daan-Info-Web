<?php
//處理控制列的顯示邏輯
namespace daan_info_web\Presenters;


class ctrlbarPresenter
{
    public function ctrlbar($status,$memID)
    {
        $bar = '';
        if($status != 'guest' && $status != NULL)
        {
            if($status == 'student')
                $bar .= '<li><a href="/topic/showTopic" style="color:white;">我的專題</a></li>';
            else
            {
                if($status == 'admin')
                {

                }
            }
                $bar .= '<li><a href="/changePwd" style="color:white;">修改密碼</a></li>';
        }

        return $bar;
    }

    public function loginOrLogout($status)
    {
        $bar = '';
        if($status == 'guest' || $status == NULL)
            $bar = '<a href="/login" style="color:white;"><img src="'.asset('img/login.png').'"></a>';
        else
            $bar = '<a href="/logout" style="color:white;">登出</a>';

        return $bar;
    }
} 