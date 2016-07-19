<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    protected $fillable = ['student_id', 'class_id','stage', 'group', 'sem1_eval_1', 'sem1_eval_2', 'sem1_eval_3',
        'sem1_eval_4', 'sem2_eval_1', 'sem2_eval_2', 'sem2_eval_2', 'sem2_eval_4'];


    public function students()
    {
        return $this->belongsTo('App\Student');
    }

}
