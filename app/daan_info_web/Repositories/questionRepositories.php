<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2016/2/26
 * Time: 上午 11:33
 */

namespace daan_info_web\Repositories;

use daan_info_web\Question;


class questionRepositories {

    protected $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }
} 