<?php

namespace App\Http\Controllers;

use App\ParentStudent;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ParentStudentsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ParentStudent::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ParentStudent::create(array(
            'name' =>  Input::get('name'),
            'email' =>  Input::get('email'),
            'phone' =>  Input::get('phone'),
            'status' =>  Input::get('status'),
        ) );


        return json_encode(array("success"=>true));
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
        return ParentStudent::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parent = ParentStudent::find($id);
        $parent->name =  Input::get('name');
        $parent->email = Input::get('email');
        $parent->occupancy = Input::get('occupancy');
        $parent->phone = Input::get('phone');
        $parent->status = Input::get('status');

        $parent->save();

        return json_encode(array("success"=>true));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ParentStudent::find($id)->delete();

        return json_encode(array("success"=>true));
    }
}
