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

    public function Pagination()
    {
        //分頁
        return $this->topicinfo
                    ->paginate(15);
    }

    public function search($searchWord )
    {
        //搜尋
        return $this->topicinfo
                    ->where('topictitle' ,'like' ,'%'.$searchWord.'%')
                    ->get();
    }

    public function getTopicinfoFromYear($year)
    {
        //搜尋年份
        return $this->topicinfo
                    ->where('groupno' ,'like' ,'%'.$year.'%')
                    ->get();
    }

    public function getTopicinfoFromTeacher($teacherno)
    {

    }
}