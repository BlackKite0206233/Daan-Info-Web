<?php

namespace daan_info_web\Repositories;

use daan_info_web\Topicgroup;

class topicgroupRepositories
{
    protected $topicgroup;

    public function __construct(Topicgroup $topicgroup)
    {
        $this->topicgroup = $topicgroup;
    }
    public function insert($groupno,$student)
    {
        foreach($student as $stu)
        {
            $topic = new Topicgroup;
            $topic->groupno = $groupno;
            $topic->student = $stu;
        }

    }
}