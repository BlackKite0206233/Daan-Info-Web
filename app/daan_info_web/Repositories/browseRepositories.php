<?php

namespace daan_info_web\Repositories;

use daan_info_web\Topicinfo;

class browseRepositories
{
    protected $topicinfo;

    public function __construct(Topicinfo $topicinfo)
    {
        $this->topicinfo = $topicinfo;
    }

    public function Pagination($page)
    {
        //分頁
    }

    public function search($type ,$searchWord ,$where)
    {
        //搜尋
    }

    public function year($year)
    {
        //搜尋年份
    }
}