<?php

namespace daan_info_web\Repositories;

use daan_info_web\Scorelist;

class scoreRepositories
{
    protected $scorelist;

    public function __construct(Scorelist $scorelist)
    {
        $this->scorelist = $scorelist;
    }

    public function insertScoreList($scoreName ,$present)
    {
        //新增評分項目
        $scorelist = new Scorelist;
        $scorelist->scorename = $scoreName;
        $scorelist->present = $present;
        $scorelist->save();
    }

    public function editScoreList($id  ,$scoreName ,$present)
    {
        //編輯評分項目
        $this->scorelist
            ->where('idno' ,$id)
            ->update(['scorename'=>$scoreName ,'present'=>$present]);
    }

    public function deleteScoreList($id)
    {
        //刪除評分項目
        $this->scorelist
            ->where('idno' ,$id)
            ->delete();
    }

    public function getAll()
    {
        return $this->scorelist
                    ->get();
    }

}