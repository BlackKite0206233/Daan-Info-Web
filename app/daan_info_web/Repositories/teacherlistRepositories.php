<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2016/2/3
 * Time: 下午 09:45
 */

namespace daan_info_web\Repositories;

use daan_info_web\Teacherlist;

class teacherlistRepositories
{
    protected $teacherlist;

    public function __construct(Teacherlist $teacherlist)
    {
        $this->teacherlist = $teacherlist;
    }
} 