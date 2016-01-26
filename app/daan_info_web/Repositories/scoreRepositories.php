<?php

namespace daan_info_web\Repositories;

use daan_info_web\Scoorelistno;
use daan_info_web\Stuscoore;

class classRepositories
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
    }

    public function editScoreList($id  ,$scoreName ,$present)
    {
        //編輯評分項目
    }

    public function deleteScoreList($id)
    {
        //刪除評分項目
    }

    public function insertScore($stuNo ,$scorelistNo ,$score)
    {
        //新增分數
    }

    public function editScore($id  ,$scorelistNo ,$score)
    {
        //編輯分數
    }

    public function deleteScore($id)
    {
        //刪除分數
    }
}