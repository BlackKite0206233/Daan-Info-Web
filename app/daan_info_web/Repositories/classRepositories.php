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
        $class = new Topictype;
        $class->typename = $typeName;
        $class->save();
    }

    public function edit($id  ,$typeName)
    {
        //編輯
        $this->topictype
            ->where('idno' ,$id)
            ->update(['typename'=>$typeName]);
    }

    public function delete($id)
    {
        //刪除
        $this->topictype
            ->where('idno' ,$id)
            ->delete();
    }
}