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

Route::get('{reactroute?}', function(){
    return view('react.index');
});
// Route::get('{reactroute?}', 'Test\TestController@view')->name('student.all');

// Route::get('test', function(){
    
//     $pfImage =  \Storage::disk('s3')->url('studentProfileImages/1.jpg');
//     $html = '<img src="' . $pfImage . '" alt="">';
//     return $html;
//     dd($pfImage);
//     return $pfImage;
// });

// Route::get('student', 'StudentController@index');




// Route::get('/test', 'Test\TestController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
