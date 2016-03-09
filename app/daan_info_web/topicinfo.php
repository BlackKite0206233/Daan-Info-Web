<?php

namespace daan_info_web;

use Illuminate\Database\Eloquent\Model;

class Topicinfo extends Model
{
    //
    protected $table = 'topicinfo';

    protected $fillable = [
        'groupno', 'topictitle', 'topickeyword', 'topictype', 'lastdate', 'topiccontent', 'pptpos', 'pdfpos', 'wmvpos', 'datpos'
    ];

    public function teacher()
    {
        return $this->belongsTo('daan_info_web\Teacher','groupno','groupno');
    }
}
