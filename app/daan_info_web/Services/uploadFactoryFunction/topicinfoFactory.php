<?php
//topicinfo工廠，參考工廠方法介面
namespace daan_info_web\Services\uploadFactoryFunction;

use daan_info_web\Repositories\topicRepositories;

class topicinfoFactory implements IFactory {

    protected $topicRepositories;
    public function __construct(topicRepositories $topicRepositories)
    {
        $this->topicRepositories = $topicRepositories;
    }

    //工廠方法介面的 selectDB 方法
    public function selectDB()
    {
        return new uploadTopicInfo($this->topicRepositories);//實體化 uploadTopicInfo 類別
    }
} 