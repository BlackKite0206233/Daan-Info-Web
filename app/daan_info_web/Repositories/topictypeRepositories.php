<?php
/**
 * Created by PhpStorm.
 * User: stu
 * Date: 2016/5/25
 * Time: 上午 10:03
 */

namespace daan_info_web\Repositories;

use daan_info_web\Topictype;
class topictypeRepositories {

    protected $topictype;

    public function __construct(Topictype $topictype)
    {
        $this->topictype = $topictype;
    }

    public function insert($name)
    {
        $type = new Topictype;
        $type->typename = $name;
        $type->save();
    }

    public function  getTopictype($id)
    {
        $topictype = $this->topictype
                          ->where('idno',$id)
                          ->first();
        return $topictype->typename;
    }
} 