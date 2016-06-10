<?php
//處理瀏覽專題頁面的顯示邏輯
namespace daan_info_web\Presenters;

use daan_info_web\Repositories\browseRepositories;

class browsePresenters {

    protected $browseRepositories;

    public function __construct(browseRepositories $browseRepositories)
    {
        $this->browseRepositories = $browseRepositories;
    }

    //取得專題
    public function topicList($year)
    {
        $Topic = "";
        if($year == 'All')//取得所有專題
            $Topic = $this->browseRepositories
                          ->Pagination();
        else//取得特定年度專題
            $Topic = $this->browseRepositories
                          ->getTopicinfoFromYear($year);

        return $this->brief($Topic);//回傳專題簡介
    }

    //製做專題簡介
    public function brief($Topic)
    {
        $result = '<div class="row">';//專題簡介外面先加上一個div標籤

        //將專題資訊做成簡介
        foreach($Topic as $topic)
        {
            $motivation = explode("#split#",$topic->topiccontent);//以 #split# 分割專題內容

            //專題內容最多顯示100字
            $len = 0;
            if(strlen($motivation[0]) > 100)
                $len = 100;
            else
                $len = strlen($motivation[0]);

            //加上HTML標籤
            //由於用ajax回傳後，jquery新增資料時內容不能換行，所以把資料全部寫成一列
            $result.= '<div class="col-sm-6 col-md-3"><a href="'.asset('browse/topic/'.$topic->groupno).'" class="thumbnail"><img data-src="'.asset('holder.js/300x300').'" src="'.asset('upload/'.substr($topic->groupno,1,3).'/'.$topic->groupno.'/'.$topic->pic).'" alt="..." style="background-color:rgba(0,0,0,.05);"><div class="caption"><h4 style="font-weight:bold;margin-top:5px;margin-bottom:5px;">'.$topic->topictitle.'</h4><h5 style="color:rgba(0,0,0,.4);margin-top:5px;margin-bottom:5px;">'.substr($topic->groupno,1,3).'年</h5><p style="color:rgba(0,0,0,.68);">'.mb_substr($motivation[0],0,$len).'</p><hr style="margin-top:15px;margin-bottom:15px;"><center><iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button_count&mobile_iframe=true&width=103&height=20&appId" width="103" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></center></div></a></div>';
        }
        $result .= '</div>';
        return $result;
    }
}