<?php

namespace daan_info_web;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'student';

    protected $fillable = [
        'stuno', 'stuname'
    ];

    public function user()
    {
        return $this->belongsTo('daan_info_web\User','stuno','acc_id');
    }
}
