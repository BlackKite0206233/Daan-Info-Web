<?php
//Topicpic的資料庫邏輯
namespace daan_info_web\Repositories;

use daan_info_web\Topicpic;

class topicpicRepositories {

    protected $topicpic;

    public function __construct(Topicpic $topicpic)
    {
        $this->topicpic = $topicpic;
    }

    //新增專題照片(只新增專題編號，上傳照片用更新的)
    public function insert($groupno)
    {
        $topicpic = new Topicpic;
        $topicpic->groupno = $groupno;
        $topicpic->save();
    }

    //取得指定專題照片
    public function getPic($groupno)
    {
        $pic = $this->topicpic
                    ->where('groupno',$groupno)
                    ->first();
        return $pic;
    }

    //更新專題照片
    public function upload($groupno,$field,$pic)
    {
        $this->topicpic
             ->where('groupno',$groupno)
             ->update([$field => $pic]);
    }
} 