<?php
//Scorelist的資料庫邏輯
namespace daan_info_web\Repositories;

use daan_info_web\Scorelist;

class scoreRepositories
{
    protected $scorelist;

    public function __construct(Scorelist $scorelist)
    {
        $this->scorelist = $scorelist;
    }

    //新增評分項目
    public function insertScoreList($scoreName ,$present)
    {
        $scorelist = new Scorelist;
        $scorelist->scorename = $scoreName;
        $scorelist->present = $present;
        $scorelist->save();
    }

    //編輯評分項目
    public function editScoreList($id  ,$scoreName ,$present)
    {
        $this->scorelist
             ->where('idno' ,$id)
             ->update(['scorename'=>$scoreName ,'present'=>$present]);
    }

    //刪除評分項目
    public function deleteScoreList($id)
    {
        $this->scorelist
             ->where('idno' ,$id)
             ->delete();
    }

    //取得所有評分項目
    public function getAll()
    {
        return $this->scorelist
                   ->get();
    }

}