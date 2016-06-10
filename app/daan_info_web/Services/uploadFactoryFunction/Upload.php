<?php
//上傳檔案的抽象類別
namespace daan_info_web\Services\uploadFactoryFunction;

use Validator;
use Response;
use Illuminate\Http\Request;
abstract class Upload {

    public $groupno = "";//上傳的組別編號
    public $Rule = "";//檔名限制
    public $field = "";//儲存欄位名稱

    //設定檔名限制
    public function setRule($rules)
    {
        $list = "";
        //每個限制用 "，" 隔開
        foreach($rules as $rule)
        {
            $list .= $rule.',';
        }
        $list = substr($list,0,-1);

        $Rule = ['file' => 'required | mimes:'.$list];//設定檔名限制
    }

    //上傳檔案
    protected function upload(Request &$files,$groupno)
    {
        $list = "";
        foreach($files as $file)
        {
            $validator = Validator::make(['file' => $file],$this->Rule);
            if(!$validator->fails())
            {
                if($file->isVaild())
                {
                    if($groupno != "")//專題檔案儲存路徑
                    {
                        $year = substr($groupno,1,3);
                        $destinationPath = base_path() . '/upload/' . $year . '/' . $groupno;
                    }
                    else//老師照片儲存路徑
                    {
                        $destinationPath = base_path() . '/upload/teacher' ;
                    }

                    $extension = $file->getClientOriginalExtension();
                    $fileName = $file->getClientOriginaName() . '.' . $extension;

                    $file->move($destinationPath,$fileName);

                    //用 "|" 隔開檔名
                    $list .= $fileName . "|";
                }
            }

        }
        $list = substr($list,0,-1);

        return $list;
    }

    //上傳檔案方法
    public function uploadFile(Request &$Files)
    {

    }
} 