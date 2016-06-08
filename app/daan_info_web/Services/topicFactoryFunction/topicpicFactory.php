<?php
/**
 * Created by PhpStorm.
 * User: Yeh
 * Date: 2016/6/8
 * Time: 上午 09:42
 */

namespace daan_info_web\Services\topicFactoryFunction;

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

    public function selectDB()
    {
        return new uploadTopicPic($this->topicpicRepositories,$this->topicServices);
    }
} 