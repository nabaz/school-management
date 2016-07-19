<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['prefix' => 'api'], function() {
    /**
     * Protected Routes
     */

    Route::get(
        '/classes',
        ['uses' => 'ClassesController@index']
    );
    Route::get(
        '/classes/{id}',
        ['uses' => 'ClassesController@show']
    );
    Route::patch(
        '/classes/{id}',
        ['uses' => 'ClassesController@update']
    );
    Route::post(
        '/classes/',
        ['uses' => 'ClassesController@create']
    );
    Route::delete(
        '/classes/{id}',
        ['uses' => 'ClassesController@delete']

    );
    /* Teachers */
    Route::get(
        '/teachers',
        ['uses' => 'TeachersController@index']
    );
    Route::get(
        '/teachers/{id}',
        ['uses' => 'TeachersController@show']
    );
    Route::patch(
        '/teachers/{id}',
        ['uses' => 'TeachersController@update']
    );
    Route::post(
        '/teachers/',
        ['uses' => 'TeachersController@create']
    );
    Route::delete(
        '/teachers/{id}',
        ['uses' => 'TeachersController@delete']
    );


    /* Students */
    Route::get(
        '/students',
        ['uses' => 'StudentsController@index']
    );
    Route::get(
        '/students/{id}',
        ['uses' => 'StudentsController@show']
    );
    Route::patch(
        '/students/{id}',
        ['uses' => 'StudentsController@update']
    );
    Route::post(
        '/students/',
        ['uses' => 'StudentsController@create']
    );
    Route::delete(
        '/students/{id}',
        ['uses' => 'StudentsController@delete']
    );
    Route::get(
        '/final-report/{id}',
        ['uses' => 'StudentsController@finalReport']
    );
    /* reports */
    Route::get(
        '/reports',
        ['uses' => 'ReportsController@index']
    );
    Route::get(
        '/reports/{id}',
        ['uses' => 'ReportsController@show']
    );
    Route::patch(
        '/reports/{id}',
        ['uses' => 'ReportsController@update']
    );
    Route::post(
        '/reports/',
        ['uses' => 'ReportsController@create']
    );
    Route::delete(
        '/reports/{id}',
        ['uses' => 'ReportsController@delete']
    );

    /* parentstudents */
    Route::get(
        '/parents',
        ['uses' => 'ParentStudentsController@index']
    );
    Route::get(
        '/parents/{id}',
        ['uses' => 'ParentStudentsController@show']
    );
    Route::patch(
        '/parents/{id}',
        ['uses' => 'ParentStudentsController@update']
    );
    Route::post(
        '/parents/',
        ['uses' => 'ParentStudentsController@create']
    );
    Route::delete(
        '/parents/{id}',
        ['uses' => 'ParentStudentsController@delete']
    );


    /* About */
    Route::get('/about',
        ['uses' => 'AboutController@index']

    );



});

/* Unprotected Routes */

Route::post(
    '/api/authenticate',
    ['uses' => 'AuthenticateController@authenticate']
);
Route::post(
    '/api/register',
    ['uses' => 'AuthenticateController@registerUser']
);
Route::post(
    '/api/authenticate/refresh-token',
    ['uses' => 'AuthenticateController@refreshToken']
);


Route::get('/', function () {
    return view('index');
});
