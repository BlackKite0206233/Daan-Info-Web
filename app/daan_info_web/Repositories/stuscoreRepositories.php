<?php
//Stuscore的資料庫邏輯
namespace daan_info_web\Repositories;

use daan_info_web\Stuscore;

class stuscoreRepositories
{
    protected $stuscore;

    public function __construct(Stuscore $stuscore)
    {
        $this->stuscore = $stuscore;
    }

    //新增學生分數(只新增學生編號，打分數時用更新的)
    public function insert($stuno)
    {
        $stu = new Stuscore;
        $stu->stuno = $stuno;
        $stu->save();
    }

    //編輯學生分數
    public function edit($scores)
    {
        foreach($scores as $score)
        {
            $this->stuscore
                 ->where('idno',$score['id'])
                 ->update(['score'=>$score['score']]);
        }
    }

}
