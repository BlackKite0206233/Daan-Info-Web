<?php

namespace daan_info_web\Repositories;

use daan_info_web\Topicinfo;

class browseRepositories
{
    public function __construct(Topicinfo $topicinfo)
    {
        $this->topicinfo = $topicinfo;
    }


}