<?php
//topicpic工廠，參考工廠方法介面
namespace daan_info_web\Services\uploadFactoryFunction;

use daan_info_web\Repositories\topicpicRepositories;
use daan_info_web\Services\topicServices;

class topicpicFactory implements IFactory {

    protected $topicpicRepositories;
    protected $topicServices;

    public function __construct(topicpicRepositories $topicpicRepositories,
                               topicServices $topicServices)
    {
        $this->topicpicRepositories = $topicpicRepositories;
        $this->topicServices = $topicServices;
    }

    //工廠方法介面的 selectDB 方法
    public function selectDB()
    {
        return new uploadTopicPic($this->topicpicRepositories,$this->topicServices);//實體化 uploadTopicPic 類別
    }
} 