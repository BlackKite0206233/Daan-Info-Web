<?php
//Question的資料庫邏輯
namespace daan_info_web\Repositories;

use daan_info_web\Question;

class questionRepositories {

    protected $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    //新增自評問題(只新增專題編號，新增問題時用更新的)
    public function insert($groupno)
    {
        for($i=0;$i<3;$i++)
        {
            $qestion = new Question;
            $qestion->groupno = $groupno;
            $qestion->save();
        }
    }

    //編輯自評問題
    public function update($id,$question)
    {
        $this->question
             ->where('idno',$id)
             ->update(['question'=>$question]);
    }

    //刪除自評問題
    public function delete($id)
    {
        $this->question
             ->where('idno',$id)
             ->delete();
    }

    //取得特定組別得自評問題
    public function getQuestionFromGroupno($groupno)
    {
        return $this->question
                   ->where('groupno',$groupno)
                   ->get();
    }
} 