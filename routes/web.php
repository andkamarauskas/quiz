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
Route::get('auth/google', 'Auth\RegisterController@google'); 
Route::get('auth/google/callback', 'Auth\RegisterController@googleCallback');
Route::get('auth/facebook', 'Auth\RegisterController@facebook'); 
Route::get('auth/facebook/callback', 'Auth\RegisterController@facebookCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
	Route::resource('admin/quiz', 'Admin\\QuizController');
	Route::resource('admin/quest', 'Admin\\QuestController');
	Route::resource('admin/category', 'Admin\\CategoryController');
	
	Route::get('/train', 'TrainController@index')->name('train.index');
	Route::get('/train/start', 'TrainController@start')->name('train.start');
	Route::get('/train/play', 'TrainController@play')->name('train.play');
	Route::post('/train/next', 'TrainController@next')->name('train.next');
	Route::get('/train/results/{train_id}', 'TrainController@results')->name('train.results');

	Route::get('quest/livesearch','Admin\QuizController@liveSearch');      
	Route::get('quest/list','Admin\QuizController@questList');      
	Route::get('quest/attach','Admin\QuizController@attachQuest')->name('quiz.attach');    
	Route::get('quest/detach','Admin\QuizController@detachQuest')->name('quiz.detach');    
});
