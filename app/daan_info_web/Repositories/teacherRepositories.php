<?php
//Teacherpic的資料庫邏輯
namespace daan_info_web\Repositories;

use daan_info_web\Teacherpic;

class teacherRepositories
{
    protected $teacherpic;

    public function __construct(Teacherpic $teacherpic)
    {
        $this->teacherpic = $teacherpic;
    }

    //新增老師照片
    public function insert($acc,$teacherpic)
    {
        $Teacher = new Teacherpic;
        $Teacher->acc = $acc;
        $Teacher->pic = $teacherpic;
        $Teacher->save();
    }

    //取得指定老師照片
    public function getPic($acc)
    {
        $pic = $this->teacherpic
                    ->where('acc',$acc)
                    ->first();
        return $pic->pic;
    }

}