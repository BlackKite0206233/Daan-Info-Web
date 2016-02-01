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

}
