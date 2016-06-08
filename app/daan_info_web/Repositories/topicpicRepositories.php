<?php
/**
 * Created by PhpStorm.
 * User: stu
 * Date: 2016/5/27
 * Time: 上午 10:20
 */

namespace daan_info_web\Repositories;

use daan_info_web\Topicpic;

class topicpicRepositories {

    protected $topicpic;

    public function __construct(Topicpic $topicpic)
    {
        $this->topicpic = $topicpic;
    }

    public function insert($groupno)
    {
        $topicpic = new Topicpic;

        $topicpic->groupno = $groupno;

        $topicpic->save();
    }

    public function getPic($groupno)
    {
        $pic = $this->topicpic
                    ->where('groupno',$groupno)
                    ->first();
        return $pic;
    }

    public function upload($groupno,$field,$pic)
    {
        $this->topicpic
             ->where('groupno',$groupno)
             ->update([$field => $pic]);
    }
} 