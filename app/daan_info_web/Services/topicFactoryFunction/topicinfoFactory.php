<?php
/**
 * Created by PhpStorm.
 * User: Yeh
 * Date: 2016/6/8
 * Time: 上午 09:42
 */

namespace daan_info_web\Services\topicFactoryFunction;

use daan_info_web\Repositories\topicRepositories;
use daan_info_web\Services\topicServices;


class topicinfoFactory implements IFactory {

    protected $topicRepositories;
    protected $topicServices;
    public function __construct(topicRepositories $topicRepositories,
                               topicServices $topicServices)
    {
        $this->topicRepositories = $topicRepositories;
        $this->topicServices = $topicServices;
    }

    public function selectDB()
    {
        return new uploadTopicInfo($this->topicRepositories,$this->topicServices);
    }
} 