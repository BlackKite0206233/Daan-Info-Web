<?php
/**
 * Created by PhpStorm.
 * User: Yeh
 * Date: 2016/6/8
 * Time: 上午 09:28
 */

namespace daan_info_web\Services\topicFactoryFunction;

use Illuminate\Http\Request;
abstract class Upload {

    public $groupno;
    public $Rule;
    public $field;

    public function setRule($rules)
    {
        $list = "";
        foreach($rules as $rule)
        {
            $list .= $rule.',';
        }
        $list = substr($list,0,-1);
        $Rule = ['file' => 'required | mimes:'.$list];
    }

    public function upload(Request &$Files)
    {

    }
} 