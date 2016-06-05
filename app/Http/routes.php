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

Route::group(['middleware'=>['web']],function(){
                                                                                          ////以下所有人都可以進入

    Route::get('/', function () {   return view('index');   });                             //首頁
    Route::get('ref',function () {  return view('ref'); });                                 //參考資料頁面

    Route::group(['prefix'=>'browse'],function(){
        Route::get('page','browseController@Pagination');                                  //顯示所有專題
        Route::get('year/{year}','browseController@year');                                 //依年度顯示專題
        Route::get('topic/{topic}','browseController@topic');                              //顯示專題詳細資訊
        Route::get('teacher','browseController@teacherPage');                              //開課資訊頁面
        Route::get('teacher/{teacher}','browseController@teacher');                        //依老師顯示專題
        Route::post('search','browseController@search');                                   //搜尋專題
    });


    Route::group(['middleware'=>'userMiddleware'],function(){                              ////以下必須登入才可以進入

        Route::get('changePwd','memberController@changePwd');                              //變更密碼頁面
        Route::get('logout','userController@logout');                                      //登出

        Route::group(['prefix'=>'topic'],function() {
            Route::get('showTopic', 'topicController@showTopic');                          //個人專題頁面
            Route::get('upload', 'topicController@uploadPage');                            //上傳檔案
            Route::post('upload', 'topicController@upload');                               //上傳檔案
            Route::put('{topic}/info', 'topicController@updateinfo');                      //編輯專題資訊
        });

        Route::resource('question','questionController',['except'=>['destroy','edit']]);    //管理自評問題
        Route::resource('topic','topicController',['except'=>['destroy','show','edit']]);   //管理專題
        Route::resource('member','memberController',['except'=>['destroy','edit']]);        //管理學生
    });


    Route::group(['middleware'=>'teacherMiddleware'],function(){                            ////以下只有老師可以進入

        Route::get('topic/edit','topicController@teacherEdit');                             //編輯專題
        Route::get('download','downloadController@index');                                  //下載表格
        Route::resource('score','scoreController',['only'=>['index','update','edit']]);      //管理評分
        Route::resource('gradeinfo','gradeinfoController');                                  //管裡開課資訊
    });

    Route::group(['middleware'=>'adminMiddleware'],function(){                               ////以下只有系統管理元可以進入

        Route::resource('teacher','teacherController',['only'=>['index','store','create']]); //管理老師
        Route::resource('class','classController',['except'=>['edit','update']]);            //管理專題類別
        Route::resource('scorelist','scorelistController',['except'=>['edit']]);             //管理評分項目
    });


                                                                                            ////以下所有人都可以進入

    Route::resource('login','userController',['only'=>['index','store']]);                   //登入
});




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


