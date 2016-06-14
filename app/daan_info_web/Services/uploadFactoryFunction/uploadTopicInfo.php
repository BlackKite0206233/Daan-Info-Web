<?php
//上傳檔案，繼承 Upload 類別
namespace daan_info_web\Services\uploadFactoryFunction;

use daan_info_web\Repositories\topicRepositories;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\File\UploadedFile;
class uploadTopicInfo extends Upload {

    protected $topicRepositories;

    public function __construct(topicRepositories $topicRepositories)
    {
        $this->topicRepositories = $topicRepositories;
    }

    //override upload
    public function uploadFile(UploadedFile $files,$oldFile)
    {
        //上傳檔案
        $file = $this->upload($files,$oldFile);

        //更新 topicinfo 資料表內容
        if($file != "")
            $this->topicRepositories
                 ->upload($this->groupno,$this->field,$file);
    }
} 