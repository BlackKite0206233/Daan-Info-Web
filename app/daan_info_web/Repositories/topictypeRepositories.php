<?php
//Topictype的資料庫邏輯
namespace daan_info_web\Repositories;

use daan_info_web\Topictype;
class topictypeRepositories {

    protected $topictype;

    public function __construct(Topictype $topictype)
    {
        $this->topictype = $topictype;
    }

    //新增專題類別
    public function insert($name)
    {
        $type = new Topictype;
        $type->typename = $name;
        $type->save();
    }

    //取得指定專題類別
    public function  getTopictype($id)
    {
        $topictype = $this->topictype
                          ->where('idno',$id)
                          ->first();
        return $topictype->typename;
    }

    //取得所有專題類別
    public function all()
    {
        $topictype = $this->topictype
                          ->all();
        return $topictype;
    }
} 