<?php

namespace daan_info_web\Repositories;

use daan_info_web\Topicinfo;


class topicRepositories
{
    protected $topicinfo;

    public function __construct(Topicinfo $topicinfo)
    {
        $this->topicinfo = $topicinfo;
    }

    public function insert($groupno)
    {
        //新增
        $topic = new Topicinfo;
        $topic->groupno = $groupno;
        $topic->save();
    }

    public function edit($id  ,$update)
    {
        //編輯

    }

    public function delete($id)
    {
        //刪除
        $this->topicinfo
            ->where('idno' ,$id)
            ->delete();
    }

    public function all()
    {
        return $this->topicinfo
                    ->get();
    }

    public function one($id)
    {
        return $this->topicinfo
                    ->where('idno' ,$id)
                    ->get();
    }
}