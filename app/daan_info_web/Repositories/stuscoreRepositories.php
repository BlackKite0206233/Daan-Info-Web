<?php

namespace daan_info_web\Repositories;

use daan_info_web\Stuscoore;

class stuscoreRepositories
{
    protected $stuscore;

    public function __construct(Stuscoore $stuscoore)
    {
        $this->stuscore = $stuscoore;
    }

    public function insert($acc_id)
    {
        $stu = new Stuscoore;
        $stu->acc_id = $acc_id;
        $stu->save();
    }

}
