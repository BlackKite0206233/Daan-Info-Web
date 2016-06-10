<?php
//teacherpic工廠，參考工廠方法介面
namespace daan_info_web\Services\uploadFactoryFunction;

class teacherpicFactory implements IFactory {

    //工廠方法介面的 selectDB 方法
    public function selectDB()
    {
        return new uploadTeacherPic();//實體化 uploadTeacherPic 類別
    }
} 