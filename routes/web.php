<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*标准页面*/
Route::group(['middleware'=>'web'],function (){
    Route::any('/','IndexController@Index');
    Route::any('/storage/checking','StorageController@checking');
    Route::any('/cabin/login','AdminController@login');
    Route::any('/board/login','BoardController@login');
    Route::any('/onedrive',"IndexController@drive");
    Route::get('/c6',function (){
        return view('c6');
    });
    Route::get('/c7',function (){
        return view('c7');
    });
    Route::get('/c8',function (){
        return view('c8');
    });
    Route::get('/c9',function (){
        return view('c9');
    });
    Route::get('/color',function(){
	return view('c10');
    });
});
/*文章组*/
Route::group(['middleware'=>'web'],function (){
    Route::any('/art/show/{id}','ArticleController@Show');
});
/*管理组*/
Route::group(['middleware'=>['web','admin']],function (){
    Route::any('/art/make','AdminController@ArtMake');
});
/*测试页面*/
Route::any('/text','IndexController@fonts');
Route::any('/cookie','IndexController@coo');
/*Board管理*/
Route::group(['middleware'=>['web','userGuest']],function (){
    Route::any('/board/message','BoardController@leave');
});

