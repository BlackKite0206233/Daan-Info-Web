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
Route::group(['prefix'=>'browse'],function(){
    Route::get('/page/{pageNo}','browseController@Pagination');
    Route::get('/search','browseController@searchPage');
    Route::post('/search','browseController@search');
    Route::get('/year/{year}','browseController@year');
});
Route::resource('topic','topicController');
Route::resource('gradeinfo','gradeinfoController');
Route::resource('member','memberController');
Route::resource('login','userController');
Route::resource('class','classController');
Route::get('/logout','userController@logout');

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


