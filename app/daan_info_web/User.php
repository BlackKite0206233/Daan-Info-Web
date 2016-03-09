<?php

namespace daan_info_web;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'acc', 'acc_id', 'password','memberno','category'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student()
    {
        return $this->hasOne('daan_info_web\Student','acc_id','stuno');
    }

    public function teacherList()
    {
        return $this->hasOne('daan_info_web\Teacherlist','memberno','idno');
    }

    public function stuScore()
    {
        return$this->hasMany('daan_info_web\Stuscore','acc_id','stuno');
    }
}
