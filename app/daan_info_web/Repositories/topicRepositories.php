<?php
//Topicinfo的資料庫邏輯
namespace daan_info_web\Repositories;

use daan_info_web\Topicinfo;

class topicRepositories
{
    protected $topicinfo;

    public function __construct(Topicinfo $topicinfo)
    {
        $this->topicinfo = $topicinfo;
    }

    //新增專題(只新增專題編號、指導老師、標題，其他編輯時再更新)
    public function insert($groupno,$teacher,$title)
    {
        $topic = new Topicinfo;
        $topic->groupno = $groupno;
        $topic->teacher = $teacher;
        $topic->topictitle = $title;
        $topic->save();
    }

    //更新專題資訊
    public function edit($id,$title,$keyword,$type)
    {
        $this->topicinfo
             ->where('groupno' ,$id)
             ->update(['topictitle' => $title ,'topickeyword' => $keyword ,'topictype' => $type]);
    }

    //更新專題內容
    public function editcontent($id,$content,$video)
    {
        $this->topicinfo
             ->where('groupno',$id)
             ->update(['topiccontent'=>$content,'video'=>$video]);
    }

    //更新上傳檔案
    public function upload($id,$field,$path)
    {

        $this->topicinfo
             ->where('groupno' ,$id)
             ->update([$field => $path]);
    }

    //刪除專題
    public function delete($id)
    {
        //刪除
        $this->topicinfo
             ->where('idno' ,$id)
             ->delete();
    }

    //取得所有專題
    public function getAll()
    {
        return $this->topicinfo
                   ->get();
    }

    //取得指定編號專題
    public function getFromId($id)
    {
        return $this->topicinfo
                   ->where('idno' ,$id)
                   ->get();
    }

    //取得專題組別編號
    public function getGroupno($id)
    {
        $groupno =  $this->topicinfo
                         ->where('idno' ,$id)
                         ->first();
        return $groupno->groupno;
    }

    //取得特定組別專題
    public function getTopicFromGroupNo($groupNo)
    {
        return $this->topicinfo
                   ->where('groupno',$groupNo)
                   ->first();

    }
}