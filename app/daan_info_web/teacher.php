<?php

namespace daan_info_web;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $table = 'teacher';

    protected $fillable = [
        'teacherno', 'groupno'
    ];

    public function topicInfo()
    {
        return $this->hasOne('daan_info_web\Topicinfo','groupno','groupno');
    }

    public function topicGroup()
    {
        return $this->hasMany('daan_info_web\Topicgroup','groupno','groupno');
    }

    public function teacherList()
    {
        return $this->belongsTo('daan_info_web\Teacherlist','teacherno','idno');
    }
}
