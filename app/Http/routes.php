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
	return view('errors/404');
});
Route::get('403',function(){
	return view('errors/403');
});
Route::get('auth/login',function(){
	return view('login');
});
Route::get('/loc/{locality}','HospitalController@index');
Route::get('/loc/{locality}/{id}','HospitalController@getHospital')->where('id','[0-9]+');
Route::get('/loc/{locality}/{speciality}','HospitalController@speciality');
Route::get('/comments','HospitalController@commentRequest');
Route::get('/api/comments/{locality}/{id}','HospitalController@commentRequest');
Route::post('/api/comments/{locality}/{id}','HospitalController@commentRequest');
Route::get('/auth/login/{Provider}','Auth\OAuthLogin@redirectToProvider');
Route::get('/OAuth/f/Callback','Auth\OAuthLogin@handleFacebookCallback');
Route::get('/OAuth/t/Callback','Auth\OAuthLogin@handleTwitterCallback');
Route::get('/OAuth/g/Callback','Auth\OAuthLogin@handleGoogleCallback');