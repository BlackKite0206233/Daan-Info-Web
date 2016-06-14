<?php
//上傳檔案的抽象類別
namespace daan_info_web\Services\uploadFactoryFunction;

use Validator;
use Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;
abstract class Upload {

    public $groupno = "";//上傳的組別編號
    public $Rule = array();//檔名限制
    public $field = "";//儲存欄位名稱

    //設定檔名限制
    public function setRule($rules)
    {
//        $list = "";
//        //每個限制用 "，" 隔開
//        foreach($rules as $rule)
//        {
//            $list .= $rule.',';
//        }
//        $list = substr($list,0,-1);
//
//        $this->Rule = 'mimes:'.$list;//設定檔名限制
        $this->Rule = $rules;
    }

    //上傳檔案
    protected function upload(UploadedFile $file,$oldFile)
    {
        $list = "";
//        foreach($files as $file)
//        {
//            $validator = Validator::make( array('file' => $file) , array('file' => array($this->Rule) ) );
//
//            if($validator->fails())
//            {

            //laravel內建的驗證無法使用(可能是bug吧)，所以自己寫一個
            foreach($this->Rule as $rule)
            {
                if($file->getClientOriginalExtension() == $rule)//驗證副檔名是否正確
                {
                    if($file->isValid())//驗證檔案是否有效
                    {
                        if($this->groupno != "")//專題檔案儲存路徑
                        {
                            $year = substr($this->groupno,1,3);
                            $destinationPath = public_path() . '/upload/' . $year . '/' . $this->groupno;
                        }
                        else//老師照片儲存路徑
                        {
                            $destinationPath = public_path() . '/upload/teacher' ;
                        }

                        $fileName = $file->getClientOriginalName();

                        File::delete($destinationPath.'/'.$oldFile);

                        $file->move($destinationPath,$fileName);

                        //用 "|" 隔開檔名
                        $list .= $fileName . "|";
                    }
                }

            }

//            }

//        }
        $list = substr($list,0,-1);

        return $list;
    }

    //上傳檔案方法
    public function uploadFile(UploadedFile $Files,$oldFile)
    {

    }
} 