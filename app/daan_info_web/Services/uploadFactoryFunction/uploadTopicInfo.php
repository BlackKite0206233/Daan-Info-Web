<?php
//上傳檔案，繼承 Upload 類別
namespace daan_info_web\Services\uploadFactoryFunction;

use daan_info_web\Repositories\topicRepositories;

use Illuminate\Http\Request;
class uploadTopicInfo extends Upload {

    protected $topicRepositories;


    public function __construct(topicRepositories $topicRepositories)
    {
        $this->topicRepositories = $topicRepositories;
    }

    //override upload
    public function uploadFile(Request &$files)
    {
        //上傳檔案
        $file = $this->upload($files,$this->groupno);

        //更新 topicinfo 資料表內容
        if($file != "")
            $this->topicRepositories
                 ->upload($this->groupno,$this->field,$file);
    }
} 