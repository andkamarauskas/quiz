<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/category', 'Admin\\CategoryController');
});
Route::group(['middleware' => ['web']], function () {
	Route::resource('admin/quest', 'Admin\\QuestController');
});

Route::group(['middleware' => ['auth']], function() {
	Route::get('/train', 'TrainController@index')->name('train.index');
	Route::get('/train/start', 'TrainController@start')->name('train.start');
	Route::get('/train/play', 'TrainController@play')->name('train.play');
	Route::post('/train/next', 'TrainController@next')->name('train.next');
	
});