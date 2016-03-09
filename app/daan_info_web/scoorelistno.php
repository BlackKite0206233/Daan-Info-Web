<?php

namespace daan_info_web;

use Illuminate\Database\Eloquent\Model;

class Scoorelistno extends Model
{
    //
    protected $table = 'scoorelistno';

    protected $fillable = [
        'scoorelistdno', 'scorename', 'present'
    ];

    public function stuScore()
    {
        return$this->belongsTo('daan_info_web\Stuscore','scoorelistdno','scoorelistdno');
    }
}
