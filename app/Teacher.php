<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
	protected $fillable = ['name', 'email','gender', 'birthday', 'degree',
		'speciality', 'job_title', 'employment_date', 'employment_start',
		'skill', 'plla', 'qonagh' ,'maratial_state', 'no_of_children',
		'milak', 'mobile'];

	protected $dates = ['birthday','employment_date', 'employment_start'];

	public function classes()
	{
		return $this->hasMany('App\Classes');
	}

	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}
}
