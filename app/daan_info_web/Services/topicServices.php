<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2016/2/15
 * Time: 下午 02:40
 */

namespace daan_info_web\Services;

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

    public function upload($groupno ,Request &$files,$rules,$local)
    {
        $list = "";
        foreach($rules as $rul)
        {
            $list .= $rul.',';
        }
        $list = substr($list,0,-1);
        $rule = ['file' => 'required | mimes:'.$list];

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

                    switch($extension)
                    {
                        case 'jpg':
                        case 'png':
                        case 'gif':
                            $field = 'pic';
                            break;
                        case 'ppt':
                        case 'pptx':
                        case 'pps':
                        case 'ppsx':
                            $field = 'ppt';
                            break;
                        case 'pdf':
                            $field = 'pdf';
                            break;
                        default :
                            $field = 'data';
                            break;
                    }

                    $file->move($destinationPath,$fileName);

                    $this->topicRepositories
                         ->upload($groupno,$field,$destinationPath . '/' . $fileName);
                }
            }
            else
            {
                return $fileName = $file->getClientOriginaName();
            }
        }

        return 0;
    }

} 