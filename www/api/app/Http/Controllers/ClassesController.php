<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Http\Requests;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ClassesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toReturn = array();
        $teachers = Teacher::all()->toArray();
        $toReturn['stages'] =  [];
        $toReturn['classes'] = array();
        $classes = DB::table('classes')->leftJoin('teachers', 'teachers.id', '=', 'classes.teacher_id')
                     ->select('classes.id as id',
                         'classes.name as name',
                         'teachers.name as teacher_name',
                         'teachers.email as email',
                         'teachers.id as teacher_id',
                         'classes.stage as stage')
                     ->get();

        $toReturn['teachers'] = array();
        while (list($teacherKey, $teacherValue) = each($teachers)) {
            $toReturn['teachers'][$teacherValue['id']] = $teacherValue;
        }

        while (list($key, $class) = each($classes)) {
            $toReturn['classes'][$key] = $class;
            if($toReturn['classes'][$key]->teacher_id != ""){
                $toReturn['classes'][$key]->teacher_id = json_decode($toReturn['classes'][$key]->teacher_id,true);
                if(is_array($toReturn['classes'][$key]->teacher_id)){
                    while (list($teacherKey, $teacherID) = each($toReturn['classes'][$key]->teacher_id)) {
                        if(isset($toReturn['teachers'][$teacherID]['fullName'])){
                            $toReturn['classes'][$key]->teacher_id[$teacherKey] = $toReturn['teachers'][$teacherID]['fullName'];
                        }else{
                            unset($toReturn['classes'][$key]->teacher_id[$teacherKey]) ;
                        }
                    }
                    $toReturn['classes'][$key]->teacher_id = implode($toReturn['classes'][$key]->teacher_id, ", ");
                }
            }
        }

        return $toReturn;

    }

    public function show($id)
    {
       $classes = Classes::findOrfail($id);

        return $classes;


    }

    public  function update($id)
    {
        $classes = Classes::find($id);
        $classes->name = Input::get('name');
        $classes->teacher_id =  Input::get('teacher_id')[0];
        $classes->stage = Input::get('stageId');
        $classes->save();

        return json_encode(array("success"=>true));
    }


    public function create(){

        Classes::create(array(
            'name' =>  Input::get('name'),
            'teacher_id' =>  Input::get('teacher_id')[0],
            'stage' =>  Input::get('stage')
        ) );


        return json_encode(array("success"=>true));
    }

    public function delete($id){

        classes::find($id)->delete();

        return json_encode(array("success"=>true));
    }
}
