<?php

namespace daan_info_web\Repositories;

use daan_info_web\Scoorelistno;
use daan_info_web\Stuscoore;

class scoreRepositories
{
    protected $scoorelistno;

    public function __construct(Scoorelistno $scoorelistno)
    {
        $this->scoorelistno = $scoorelistno;
    }

    public function insertScoreList($scoreName ,$present)
    {
        //新增評分項目
        $scorelist = new Scoorelistno;
        $scorelist->scorename = $scoreName;
        $scorelist->present = $present;
        $scorelist->save();
    }

    public function editScoreList($id  ,$scoreName ,$present)
    {
        //編輯評分項目
        $this->scoorelistno
            ->where('idno' ,$id)
            ->update(['scorename'=>$scoreName ,'present'=>$present]);
    }

    public function deleteScoreList($id)
    {
        //刪除評分項目
        $this->scoorelistno
            ->where('idno' ,$id)
            ->delete();
    }

}