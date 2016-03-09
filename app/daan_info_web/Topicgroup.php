<?php

namespace daan_info_web;

use Illuminate\Database\Eloquent\Model;

class Topicgroup extends Model
{
    //
    protected $table = 'topicgroup';

    protected $fillable = [
        'groupno', 'stuno'
    ];

    public function teacher()
    {
        return $this->belongsTo('daan_info_web\Teacher','groupno','groupno');
    }
}
