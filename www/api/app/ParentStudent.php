<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentStudent extends Model
{

    protected $fillable = ['name', 'phone', 'status', 'email'];
	public function students()
	{
		return $this->hasMany('App\Student');
	}


}
