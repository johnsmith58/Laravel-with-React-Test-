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

// 

//reactjs route
// Route::get('{reactroute?}', function(){
//     return view('react.index');
// });


Route::get('/students', 'StudentController@list')->name('student.list');
Route::post('/students', 'StudentController@store')->name('student.store');


// Route::get('/test', 'Test\TestController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
