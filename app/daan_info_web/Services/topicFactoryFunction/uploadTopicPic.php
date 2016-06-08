<?php
/**
 * Created by PhpStorm.
 * User: Yeh
 * Date: 2016/6/8
 * Time: 上午 10:01
 */

namespace daan_info_web\Services\topicFactoryFunction;

use daan_info_web\Repositories\topicpicRepositories;

use daan_info_web\Services\topicServices;
use Illuminate\Http\Request;
class uploadTopicPic extends Upload {

    protected $topicpicRepositories;
    protected $topicServices;


    public function __construct(topicpicRepositories $topicpicRepositories,
                               topicServices $topicServices)
    {
        $this->topicpicRepositories = $topicpicRepositories;
        $this->topicServices = $topicServices;
    }

    public function upload(Request &$files)
    {
        $file = $this->topicServices
                     ->upload($files,$this->field,$this->groupno);

        if($file != "")
            $this->topicpicRepositories
                 ->upload($this->groupno,$this->field,$file);
    }
} 