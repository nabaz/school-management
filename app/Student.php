<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = ['name', 'gender', 'email', 'birthday', 'parent_id', 'stage', 'group'];
    protected $dates = ['birthday'];

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function parents()
    {
        return $this->belongsTo('App\ParentStudent');
    }


    public function reports()
    {
        return $this->hasMany('App\Report');
    }

    /*public function getBirthdayAttribute($date)
    {

            return Carbon::createFromFormat('dd MM yyyy HH:mm', $date)->copy()->tz('America/Toronto')->format('F j, Y @ g:i A');
    }*/


}
