<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
	protected $table = 'classes';

	protected $fillable = ['name', 'teacher_id', 'stage'];

	public function teacher()
	{
		return $this->belongsTo('App\Teacher');
	}
	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}
}
