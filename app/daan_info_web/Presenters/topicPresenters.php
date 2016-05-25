<?php
/**
 * Created by PhpStorm.
 * User: stu
 * Date: 2016/5/23
 * Time: 下午 01:09
 */

namespace daan_info_web\Presenters;

use daan_info_web\Repositories\userRepositories;
use daan_info_web\Repositories\topictypeRepositories;

class topicPresenters {

    protected $userRepositories;
    protected $topictypeRepositories;

    public function __construct(userRepositories $userRepositories ,
                              topictypeRepositories $topictypeRepositories)
    {
        $this->userRepositories = $userRepositories;
        $this->topictypeRepositories = $topictypeRepositories;
    }

    public function getTeacher($acc)
    {
        return $this->userRepositories
                   ->getTeacher($acc);
    }

    public function getTopictype($id)
    {
        return $this->topictypeRepositories
                   ->getTopictype($id);
    }

    public function keyword($keyword)
    {
        $topickeyword = explode("、",$keyword);
        $result = "";
        for($i = 0;$i < count($topickeyword);$i++)
        {
            if($i != count($topickeyword)-1)
                $result .= '<span class="label label-info">'.$topickeyword[$i].'</span>、';
            else
                $result .= '<span class="label label-info">'.$topickeyword[$i].'</span>';
        }
        return $result;
    }
} 