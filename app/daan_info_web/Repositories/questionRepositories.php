<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2016/2/26
 * Time: 上午 11:33
 */

namespace daan_info_web\Repositories;

use daan_info_web\Question;


class questionRepositories {

    protected $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function insert($groupno,$questions)
    {
        foreach($questions as $question)
        {
            $que = new Question;
            $que->groupno->$groupno;
            $que->question = $question;
            $que->save();
        }
    }

    public function update($id,$question)
    {
        $this->question
            ->where('idno',$id)
            ->update(['question'=>$question]);

    }

    public function delete($id)
    {
        $this->question
            ->where('idno',$id)
            ->delete();
    }

    public function getAll()
    {
        return $this->question
                    ->get();
    }
} 