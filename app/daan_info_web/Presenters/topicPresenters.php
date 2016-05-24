<?php
/**
 * Created by PhpStorm.
 * User: stu
 * Date: 2016/5/23
 * Time: 下午 01:09
 */

namespace daan_info_web\Presenters;

use daan_info_web\Repositories\userRepositories;

class topicPresenters {

    protected $userRepositories;

    public function __construct(userRepositories $userRepositories)
    {
        $this->userRepositories = $userRepositories;
    }

    public function getTeacher($acc)
    {
        return $this->userRepositories
                   ->getTeacher($acc);
    }
} 