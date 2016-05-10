<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2016/2/15
 * Time: 上午 09:04
 */

namespace daan_info_web\Services;

use Auth;

use daan_info_web\Repositories\gradeinfoRepositories;
class gradeinfoServices {

    protected $gradeinfoRepositories;

    public function __construct(gradeinfoRepositories $gradeinfoRepositories)
    {
        $this->gradeinfoRepositories = $gradeinfoRepositories;
    }

    public function edit($year)
    {
        $teacher = Auth::user();
        if($teacher->acc == "admin")
            $this->gradeinfoRepositories
                 ->getFromYear($year);
        else
            $this->gradeinfoRepositories
                 ->getFromTeacherAndYear($teacher->memberno,$year);
    }
} 