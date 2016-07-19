<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Report;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ReportsController extends ApiController
{
	public function index()
	{

		$toReturn = array();

		$toReturn['stages'] =  [];
		$toReturn['students'] =  Student::all()->toArray();
		$toReturn['classes'] =  Classes::all()->toArray();
		$toReturn['reports'] = array();

		$reports = DB::table('reports')
					->leftJoin('students', 'reports.student_id', '=', 'students.id')
					->leftJoin('classes', 'reports.class_id', '=', 'classes.id')
		            ->select('reports.id as id',
			            'students.name as student_name',
			            'students.stage as stage',
			            'students.group as group',
			            'classes.name as class_name',
			            'reports.class_id as class_id',
			            'reports.student_id as student_id',
			            'reports.sem1_eval_1 as sem1_eval_1',
			            'reports.sem1_eval_2 as sem1_eval_2',
			            'reports.sem1_eval_3 as sem1_eval_3',
			            'reports.sem1_eval_4 as sem1_eval_4',
			            'reports.sem2_eval_1 as sem2_eval_1',
			            'reports.sem2_eval_2 as sem2_eval_2',
			            'reports.sem2_eval_3 as sem2_eval_3',
			            'reports.sem2_eval_4 as sem2_eval_4'
		            )->get();


		while (list($key, $report) = each($reports)) {
			$toReturn['reports'][$key] = $report;
			if($toReturn['reports'][$key]->class_id != ""){
				$toReturn['reports'][$key]->class_id = json_decode($toReturn['reports'][$key]->class_id,true);
				if(is_array($toReturn['reports'][$key]->class_id)){
					while (list($parentKey, $parentID) = each($toReturn['classes'][$key]->class_id)) {
						if(isset($toReturn['parents'][$parentID]['name'])){
							$toReturn['reports'][$key]->teacher_id[$parentKey] = $toReturn['classes'][$parentID]['name'];
						}else{
							unset($toReturn['reports'][$key]->parent_id[$parentKey]) ;
						}
					}
					$toReturn['reports'][$key]->parent_id = implode($toReturn['reports'][$key]->parent_id, ", ");
				}
			}

		}

		return $toReturn;

	}

	public function show($id)
	{
		$reports = Report::findOrfail($id);
		return $reports;

	}

	public  function update($id)
	{
		$student = Student::find(Input::get('student_id'));

		$report = Report::find($id);

		$report->student_id =  Input::get('student_id');
		$report->class_id = Input::get('class_id');
		$report->group = $student->stage;
		$report->stage =  $student->group;
		$report->class_year = Carbon::now()->toDateString();
		$report->sem1_eval_1 = Input::get('sem1_eval_1');
		$report->sem1_eval_2 = Input::get('sem1_eval_2');
		$report->sem1_eval_3 = Input::get('sem1_eval_3');
		$report->sem1_eval_4 = Input::get('sem1_eval_4');
		$report->sem2_eval_1 = Input::get('sem2_eval_1');
		$report->sem2_eval_2 = Input::get('sem2_eval_2');
		$report->sem2_eval_3 = Input::get('sem2_eval_3');
		$report->sem2_eval_4 = Input::get('sem2_eval_4');

		$report->save();

		return json_encode(array("success"=>true));

	}


	public function create(){

		$student = Student::find(Input::get('student_id'));

		Report::create(array(
			'student_id' =>  Input::get('student_id'),
			'class_id' =>  Input::get('class'),
			'group' =>  $student->group,
			'stage' =>  $student->stage,
			'sem1_eval_1' =>  Input::get('sem1_eval_1'),
			'sem1_eval_2' =>  Input::get('sem1_eval_2'),
			'sem1_eval_3' =>  Input::get('sem1_eval_3'),
			'sem1_eval_4' =>  Input::get('sem1_eval_4'),
			'sem2_eval_1' =>  Input::get('sem2_eval_1'),
			'sem2_eval_2' =>  Input::get('sem2_eval_2'),
			'sem2_eval_3' =>  Input::get('sem2_eval_3'),
			'sem2_eval_4' =>  Input::get('sem2_eval_4')

		) );


		return json_encode(array("success"=>true));
	}

	public function delete($id){

		Report::find($id)->delete();

		return json_encode(array("success"=>true));
	}
}
