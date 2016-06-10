<?php
//上傳檔案，繼承 Upload 類別
namespace daan_info_web\Services\uploadFactoryFunction;

use daan_info_web\Repositories\topicpicRepositories;

use Illuminate\Http\Request;
class uploadTopicPic extends Upload {

    protected $topicpicRepositories;

    public function __construct(topicpicRepositories $topicpicRepositories)
    {
        $this->topicpicRepositories = $topicpicRepositories;
    }

    //override upload
    public function uploadFile(Request &$files)
    {
        //上傳檔案
        $file = $this->upload($files,$this->groupno);

        //更新 topicpic 資料表內容
        if($file != "")
            $this->topicpicRepositories
                 ->upload($this->groupno,$this->field,$file);
    }
} 