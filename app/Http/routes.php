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

/*Route::get('/', function () {
    return view('welcome');
});
*/
// route to show the login form
//Route::get('/login', 'HomeController@showLogin');

// route to process the form

//Route::post('/loginuser', 'HomeController@showLogin')->name("home.loginuser");
//Route::post('/loginuser', array('uses' => 'HomeController@doLogin'));

Route::get('/','UserController@index')->name("user.index");


Route::get('/all','UserController@all')->name("user.all");
Route::get('/login','UserController@login')->name("user.login");
Route::post('/dologin','UserController@dologin')->name("user.dologin");
Route::get('/logout','UserController@logout')->name("user.logout");


Route::get('/create','UserController@create')->name("user.create");
Route::post('store', 'UserController@store')->name("user.store");

Route::get('/edit/{id}','UserController@edit')->name("user.edit");
Route::GET('/show/{id}','UserController@show')->name('user.show');

Route::get('/user/{id}/delete','userController@destroy')->name('user.destroy');
Route::post('/update/{id}','userController@update')->name('user.update');

