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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/',function(){
	return view('welcome');
});
Route::get('404',function(){
	return view('404');
});
Route::get('403',function(){
	return view('403');
});
Route::get('loc/{locality}','HospitalController@index');
Route::get('loc/{locality}/{speciality}','HospitalController@speciality');
Route::get('comments','HospitalController@commentRequest');
Route::get('api/comments','HospitalController@commentRequest');
Route::get('api/comments/post',function(){
	redirect('welcome');
});