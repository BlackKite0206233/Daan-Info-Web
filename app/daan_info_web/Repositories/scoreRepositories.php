<?php

namespace daan_info_web\Repositories;

use daan_info_web\Scoorelistno;
use daan_info_web\Stuscoore;

class scoreRepositories
{
    protected $scoorelistno;
    protected $stuscoore;

    public function __construct(Scoorelistno $scoorelistno ,Stuscoore $stuscoore)
    {
        $this->scoorelistno = $scoorelistno;
        $this->stuscoore = $stuscoore;
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

    public function insertScore($scorelist)//傳json
    {
        //新增分數
        foreach(json_decode($scorelist) as $score)
        {
            $stusore = new Stuscoore;
            $stusore->stuno = $score->stuno;
            $stusore->scoorelistidno = $score->scoorelistidno;
            $stusore->scoore = $score->scoore;
        }
    }

    public function editScore($scorelist)//傳json
    {
        //編輯分數
        foreach(json_decode($scorelist) as $score)
        {
            $this->stuscoore
                ->where('stuno' ,$score->stuno)
                ->where('scoorelistidno' ,$score->scoorelistidno)
                ->update(['scoore'=>$score->scoore]);
        }
    }

    public function deleteScore($id)
    {
        //刪除分數
        $this->stuscoore
            ->where('idno',$id)
            ->delete();
    }
}