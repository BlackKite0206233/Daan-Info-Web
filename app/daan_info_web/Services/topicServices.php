<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2016/2/15
 * Time: 下午 02:40
 */

namespace daan_info_web\Services;

use daan_info_web\Services\topicFactoryFunction\Upload;
use Validator;
use Response;
use Illuminate\Http\Request;

use daan_info_web\Repositories\topicRepositories;

class topicServices
{
    protected $topicRepositories;

    public function __construct(topicRepositories $topicRepositories)
    {
        $this->topicRepositories = $topicRepositories;
    }

    public function upload(Request &$files,$rule,$groupno)
    {

        $list = "";
        foreach($files as $file)
        {
            $validator = Validator::make(['file' => $file],$rule);
            if(!$validator->fails())
            {
                if($file->isVaild())
                {
                    $year = substr($groupno,1,3);
                    $extension = $file->getClientOriginalExtension();
                    $destinationPath = base_path() . '/upload/' . $year . '/' . $groupno;
                    $fileName = $file->getClientOriginaName() . '.' . $extension;

                    $file->move($destinationPath,$fileName);

                    $list .= $fileName . "、";

                }
            }

        }
        $list = substr($list,0,-1);

        return $list;
    }

} 