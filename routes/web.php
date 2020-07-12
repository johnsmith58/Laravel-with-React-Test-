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

Auth::routes();

Route::get('user-id', function(){
    $user = \App\StudentPhone::first();
    $user->update([
        'student_id' => 'ABC-1DEF',
        'phone_number' => 'ABC-1DEF'
    ]);
    dd($user->toArray());
});