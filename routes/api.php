<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/react/student/all', 'Test\TestController@index')->name('student.all');
Route::post('/react/student/save', 'Test\TestController@save')->name('student.save');
Route::get('/react/student/detail/{id}', 'Test\TestController@detail')->name('student.detail');
Route::get('/react/student/search', 'Test\TestController@search')->name('student.search');
Route::get('/react/student/pfImage/{pfName}', 'Test\TestController@pfImage')->name('student.pfImage');

