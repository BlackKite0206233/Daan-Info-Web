<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {   return view('index');   });
Route::get('ref',function () {  return view('ref'); });

Route::group(['prefix'=>'browse'],function(){
    Route::get('page','browseController@Pagination');
    //Route::get('/search','browseController@searchPage');
    Route::get('year/{year}','browseController@year');
    Route::get('topic/{topic}','browseController@topic');
    Route::get('teacher','browseController@teacherPage');
    Route::get('teacher/{teacher}','browseController@teacher');
    Route::post('search','browseController@search');
});

Route::group(['middleware'=>'userMiddleware'],function(){
    Route::get('upload','topicController@upload');
    Route::get('logout','userController@logout');
    Route::resource('{topicNo}/question','questionController',['except'=>['destroy','edit']]);
    Route::resource('topic','topicController',['except'=>['destroy']]);
    Route::resource('member','memberController',['except'=>['destroy']]);
});

Route::group(['middleware'=>'teacherMiddleware'],function(){
    Route::get('topic/edit','topicController@teacherEdit');
    Route::get('download','downloadController@index');
    Route::resource('score','scoreController',['only'=>['index','update','edit']]);
    Route::resource('gradeinfo','gradeinfoController');
});

Route::group(['middleware'=>'adminMiddleware'],function(){
    Route::resource('teacher','teacherController',['only'=>['index','store','create']]);
    Route::resource('class','classController',['except'=>['edit','update']]);
    Route::resource('scorelist','scorelistController',['except'=>['edit']]);
});

Route::resource('login','userController',['only'=>['index','store']]);



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


