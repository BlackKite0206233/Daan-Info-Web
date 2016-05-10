<?php

namespace daan_info_web\Repositories;

use daan_info_web\Stuscore;

class stuscoreRepositories
{
    protected $stuscore;

    public function __construct(Stuscore $stuscore)
    {
        $this->stuscore = $stuscore;
    }

    public function insert($stuno)
    {
        $stu = new Stuscore;
        $stu->stuno = $stuno;
        $stu->save();
    }

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
