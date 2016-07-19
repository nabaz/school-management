<?php

namespace App\Http\Controllers;

use App\ParentStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class StudentsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toReturn = array();
        $parents = ParentStudent::all()->toArray();
        $toReturn['stages'] =  [];
        $toReturn['students'] = array();
        $students = DB::table('students')->leftJoin('parent_students', 'parent_students.id', '=', 'students.parent_id')
                     ->select('students.id as id',
                         'students.name as name',
                         'students.email as email',
                         'students.gender as gender',
                         'students.birthday as birthday',
                         'parent_students.phone as phone',
                         'parent_students.name as parent_name',
                         'students.email as email',
                         'parent_students.id as parent_id',
                         'students.stage as stage')
                     ->get();

        while (list($parentKey, $patrentValue) = each($parents)) {
            $toReturn['parents'][$patrentValue['id']] = $patrentValue;
        }

        while (list($key, $student) = each($students)) {
            $toReturn['students'][$key] = $student;
            if($toReturn['students'][$key]->parent_id != ""){
                $toReturn['students'][$key]->parent_id = json_decode($toReturn['students'][$key]->parent_id,true);
                if(is_array($toReturn['students'][$key]->parent_id)){
                    while (list($parentKey, $parentID) = each($toReturn['classes'][$key]->teacher_id)) {
                        if(isset($toReturn['parents'][$parentID]['name'])){
                            $toReturn['students'][$key]->teacher_id[$parentKey] = $toReturn['teachers'][$parentID]['name'];
                        }else{
                            unset($toReturn['students'][$key]->parent_id[$parentKey]) ;
                        }
                    }
                    $toReturn['students'][$key]->parent_id = implode($toReturn['students'][$key]->parent_id, ", ");
                }
            }
        }

        return $toReturn;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(Carbon::createFromFormat('d/m/Y', Input::get('birthday')->toDateTimeString()));
        Student::create(array(
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'gender' => Input::get('gender'),
            'birthday' => Carbon::createFromFormat('D M d Y H:i:s e+', Input::get('birthday')),
            'parent_id' => Input::get('parent_id')[0],
            'stage' => Input::get('stage'),
            'group' => Input::get('group'),
        ));

        return json_encode(array('success'=>true));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrfail($id);
        return $student;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $student = Student::find($id);

        $student->name = Input::get('name');
        $student->email = Input::get('email');
        $student->gender = Input::get('gender');
        $student->birthday = Carbon::createFromFormat('D M d Y H:i:s e+',Input::get('birthday'));
        $student->parent_id = Input::get('parent_id');
        $student->stage = Input::get('stage');
        $student->group = Input::get('group');

        $student->save();

        return json_encode(array("success"=>true));

    }


    public function finalReport($id)
    {

//        $reports =  Student::find($id)->reports->toArray();
//
//        return $reports;

        $toReturn = array();
        $reports = Student::find($id)->reports->toArray();
        $toReturn['stages'] =  [];
        $toReturn['students'] = array();
        $students = DB::table('students')
            ->leftJoin('reports', 'reports.student_id', '=', 'students.id')
            ->leftJoin('classes', 'classes.id', '=', 'reports.class_id')
            ->select('students.id as id',
                'students.name as name',
                'students.email as email',
                'students.gender as gender',
                'students.birthday as birthday',
                'students.stage as stage',
                'reports.sem1_eval_1 as sem1_eval_1',
                'reports.sem1_eval_2 as sem1_eval_2',
                'reports.sem1_eval_3 as sem1_eval_3',
                'reports.sem1_eval_4 as sem1_eval_4',
                'reports.sem2_eval_1 as sem2_eval_1',
                'reports.sem2_eval_2 as sem2_eval_2',
                'reports.sem2_eval_3 as sem2_eval_3',
                'reports.sem2_eval_4 as sem2_eval_4',
                'classes.name as class_name'
                )
            ->where("students.id", '=', $id)
            ->get();

        while (list($parentKey, $patrentValue) = each($reports)) {
            $toReturn['parents'][$patrentValue['id']] = $patrentValue;
        }

        while (list($key, $student) = each($students)) {
            $toReturn['students'][$key] = $student;
            if($toReturn['students'][$key]->id != ""){
                $toReturn['students'][$key]->id = json_decode($toReturn['students'][$key]->id,true);
                if(is_array($toReturn['students'][$key]->id)){
                    while (list($parentKey, $parentID) = each($toReturn['classes'][$key]->id)) {
                        if(isset($toReturn['parents'][$parentID]['name'])){
                            $toReturn['students'][$key]->teacher_id[$parentKey] = $toReturn['teachers'][$parentID]['name'];
                        }else{
                            unset($toReturn['students'][$key]->parent_id[$parentKey]) ;
                        }
                    }
                    $toReturn['students'][$key]->id = implode($toReturn['students'][$key]->id, ", ");
                }
            }
        }

        return $toReturn;

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Student::find($id)->delete();
        return json_encode(array("success"=>true));

    }
}
