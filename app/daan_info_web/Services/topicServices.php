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

    public function upload($id ,$groupno ,Request &$files)
    {
        $rule = ['file' => 'required | mimes:ppt,pptx,ppts,pdf,zip,rar,7z'];

        foreach($files as $file)
        {
            $validator = Validator::make(['file' => $file],$rule);
            if($validator->fails())
            {

            }
            else
            {
                if($file->isVaild())
                {
                    $year = substr($groupno,1,3);
                    $extension = $file->getClientOriginalExtension();
                    $destinationPath = base_path() . '/file/upload/' . $year . '/' . $groupno;
                    $fileName = $file->getClientOriginaName() . '.' . $extension;

                    switch($extension)
                    {
                        case 'ppt':
                        case 'pptx':
                        case 'ppts':
                            $field = 'ppt';
                            break;
                        case 'pdf':
                            $field = 'pdf';
                            break;
                        default :
                            $field = 'dat';
                            break;
                    }

                    $file->move($destinationPath,$fileName);

                    $this->topicRepositories
                        ->upload($id,$field,$destinationPath . '/' . $fileName);
                }
            }
        }
    }

} 