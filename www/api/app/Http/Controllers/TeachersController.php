<?php

namespace App\Http\Controllers;

use App\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TeachersController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all()->toJson();

        return $teachers;
    }

    public function show($id)
    {
        $teachers = Teacher::findOrfail($id);
        return $teachers;

    }

    public  function update($id)
    {
        $classes = Teacher::find($id);
        $classes->name =  Input::get('name');
        $classes->email = Input::get('email');
        $classes->gender = Input::get('gender');
        $classes->birthday = Carbon::createFromFormat('D M d Y H:i:s e+',Input::get('birthday'));
        $classes->degree = Input::get('degree');
        $classes->speciality = Input::get('speciality');
        $classes->job_title = Input::get('job_title');
        $classes->employment_date = Carbon::createFromFormat('D M d Y H:i:s e+',Input::get('employment_date'));
        $classes->employment_start =  Carbon::createFromFormat('D M d Y H:i:s e+',Input::get('employment_start'));
        $classes->plla = Input::get('plla');
        $classes->qonagh = Input::get('qonagh');
        $classes->save();

        return json_encode(array("success"=>true));

    }


    public function create(){
        Teacher::create(array(
            'name' =>  Input::get('name'),
            'email' =>  Input::get('email'),
            'gender' =>  Input::get('gender'),
            'birthday' =>  Carbon::createFromFormat('D M d Y H:i:s e+',Input::get('birthday')),
            'degree' =>  Input::get('degree'),
            'speciality' =>  Input::get('speciality'),
            'job_title' =>  Input::get('job_title'),
            'employment_date' => Carbon::createFromFormat('D M d Y H:i:s e+',Input::get('employment_date')),
            'employment_start' => Carbon::createFromFormat('D M d Y H:i:s e+',Input::get('employment_start')),
            'plla' =>  Input::get('plla'),
            'qonagh' =>  Input::get('qonagh')
        ) );


        return json_encode(array("success"=>true));
    }

    public function delete($id){

        Teacher::find($id)->delete();

        return json_encode(array("success"=>true));
    }


}
