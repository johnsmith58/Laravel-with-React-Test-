<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function list(){

        return Student::get()->all();

        // return \App\Student::with('pfImage')->get();
    }

    public function store(Request $request){
        $request->validate([
            'name' => '',
            'email' => 'required|email'
        ]);
        $student = new \App\Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();
        return $student;
    }


}
