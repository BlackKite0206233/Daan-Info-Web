<?php
/**
 * Created by PhpStorm.
 * User: Yeh
 * Date: 2016/6/8
 * Time: 上午 10:01
 */

namespace daan_info_web\Services\topicFactoryFunction;

use daan_info_web\Repositories\topicRepositories;

use daan_info_web\Services\topicServices;
use Illuminate\Http\Request;
class uploadTopicInfo extends Upload {

    protected $topicRepositories;
    protected $topicServices;


    public function __construct(topicRepositories $topicRepositories ,
                               topicServices $topicServices)
    {
        $this->topicRepositories = $topicRepositories;
        $this->topicServices = $topicServices;
    }

    public function upload(Request &$files)
    {
        $file = $this->topicServices
                     ->upload($files,$this->field,$this->groupno);

        if($file != "")
            $this->topicRepositories
                 ->upload($this->groupno,$this->field,$file);
    }
} 