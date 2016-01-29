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
Route::get('/ref','refController@index');
//Route::get('/gradeinfo/{teacher}','gradeingoController@teacher');

Route::group(['prefix'=>'browse'],function(){

    Route::get('/page','browseController@Pagination');
    Route::get('/search','browseController@searchPage');
    Route::get('/year/{year}','browseController@year');
    Route::get('/teacher','browseController@teacherPage');
    Route::get('/topic/{topic}','browseController@topic');
    Route::post('/teacher','browseController@teacher');
    Route::post('/search','browseController@search');
});
Route::group(['middleware'=>'userMiddleware'],function(){

    Route::get('/upload','topicController@upload');
    Route::get('/logout','userController@logout');
    Route::resource('topic','topicController');
});

Route::group(['middleware'=>'teacherMiddleware'],function(){

    Route::resource('scorelist','scorelistController');
    Route::resource('score','scoreController');
    Route::resource('member','memberController');
    Route::resource('class','classController');
    Route::resource('gradeinfo','gradeinfoController');
});

Route::resource('login','userController');



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


