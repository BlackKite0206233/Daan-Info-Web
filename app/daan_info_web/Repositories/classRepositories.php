<?php

namespace daan_info_web\Repositories;

use daan_info_web\Topictype;

class classRepositories
{
    protected $topictype;

    public function __construct(Topictype $topictype)
    {
        $this->topictype = $topictype;
    }

    public function insert($typeName)
    {
        //新增
    }

    public function edit($id  ,$typeName)
    {
        //編輯
    }

    public function delete($id)
    {
        //刪除
    }
}