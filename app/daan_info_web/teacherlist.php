<?php

namespace daan_info_web;

use Illuminate\Database\Eloquent\Model;

class Teacherlist extends Model
{
    //
    protected $table = 'teacherlist';

    protected $fillable = [
        'idno', 'teachername'
    ];

    public function user()
    {
        return $this->belongsTo('daan_info_web\User','idno','memberno');
    }

    public function teacher()
    {
        return $this->hasMany('daan_info_web\Teacher','idno','teacherno');
    }
}
