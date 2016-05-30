<?php
/**
 * Created by PhpStorm.
 * User: stu
 * Date: 2016/5/25
 * Time: 上午 11:39
 */

namespace daan_info_web\Presenters;

use daan_info_web\Repositories\browseRepositories;

class browsePresenters {

    protected $browseRepositories;

    public function __construct(browseRepositories $browseRepositories)
    {
        $this->browseRepositories = $browseRepositories;
    }

    public function topicList($year)
    {
        $Topic = "";
        if($year == 'All')
            $Topic = $this->browseRepositories
                          ->Pagination();
        else
            $Topic = $this->browseRepositories
                          ->getTopicinfoFromYear($year);

        return $this->brief($Topic);
    }

    public function brief($Topic)
    {
//        $Topic = $this->browseRepositories
//                      ->getTopicinfoFromTeacher($acc);
        $result = '<div class="row">';

        foreach($Topic as $topic)
        {
            $motivation = explode("#split#",$topic->topiccontent);
            $len = 0;
            if(strlen($motivation[0]) > 100)
                $len = 100;
            else
                $len = strlen($motivation[0]);

            $result.= '<div class="col-sm-6 col-md-3"><a href="'.asset('browse/topic/'.$topic->groupno).'" class="thumbnail"><img data-src="'.asset('holder.js/300x300').'" src="'.asset($topic->pic).'" alt="..." style="background-color:rgba(0,0,0,.05);"><div class="caption"><h4 style="font-weight:bold;margin-top:5px;margin-bottom:5px;">'.$topic->topictitle.'</h4><h5 style="color:rgba(0,0,0,.4);margin-top:5px;margin-bottom:5px;">'.substr($topic->groupno,1,3).'年</h5><p style="color:rgba(0,0,0,.68);">'.mb_substr($motivation[0],0,$len).'</p><hr style="margin-top:15px;margin-bottom:15px;"><center><iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button_count&mobile_iframe=true&width=103&height=20&appId" width="103" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe></center></div></a></div>';
        }
        $result .= '</div>';
        return $result;
    }
}