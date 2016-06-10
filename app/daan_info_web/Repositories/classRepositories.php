<?php
//Topictype的資料庫邏輯
namespace daan_info_web\Repositories;

use daan_info_web\Topictype;

class classRepositories
{
    protected $topictype;

    public function __construct(Topictype $topictype)
    {
        $this->topictype = $topictype;
    }

    //新增專題類別
    public function insert($typeName)
    {

        $class = new Topictype;
        $class->typename = $typeName;
        $class->save();
    }

    //編輯專題類別
    public function edit($id  ,$typeName)
    {
        $this->topictype
             ->where('idno' ,$id)
             ->update(['typename'=>$typeName]);
    }

    //刪除專題類別
    public function delete($id)
    {
        $this->topictype
             ->where('idno' ,$id)
             ->delete();
    }

    //取得所有專題類別
    public function getAll()
    {
        return $this->topictype
                   ->get();
    }
}