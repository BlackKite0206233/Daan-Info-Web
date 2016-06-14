<?php
/**
 * Created by PhpStorm.
 * User: Yeh
 * Date: 2016/6/10
 * Time: 下午 11:31
 */

namespace daan_info_web\Services\uploadFactoryFunction;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\File\UploadedFile;
class uploadTeacherPic extends Upload {

    //override upload
    public function uploadFile(UploadedFile $files,$oldFile)
    {
        //上傳檔案
        $file = $this->upload($files,$oldFile);

        //更新 topicpic 資料表內容
        return $file;
    }
} 