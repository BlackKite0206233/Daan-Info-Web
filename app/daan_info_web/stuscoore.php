<?php

namespace daan_info_web;

use Illuminate\Database\Eloquent\Model;

class Stuscoore extends Model
{
    //
    protected $table = 'stuscoore';

    protected $fillable = [
        'stuno', 'scoorelistdno', 'score'
    ];

    public function user()
    {
        return$this->belongsTo('daan_info_web\User','stuno','acc_id');
    }

    public function scoreListNo()
    {
        return$this->hasOne('daan_info_web\Scorelistno','scoorelistdno','scoorelistdno');
    }
}
