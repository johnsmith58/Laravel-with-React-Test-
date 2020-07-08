<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function index(){
        // $students = \App\Student::get()->all();
        $students = \App\Student::with(['pfImage' => function($query){
            $query->orderBy('created_at', 'desc');
        }])->get();
        return response()->json($students);
    }
    public function view(){
        return view('react.index', compact('students'));
    }
    public function save(Request $request){
        $image = $request->file('image');
        $originalName = $request->file('image')->getClientOriginalName();
        $originalExtension = $request->file('image')->extension();
        $imageName = $originalName . '.' . $originalExtension;

        $request->file('image')->store('studentImages', 's3');
        return $imageName;
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $student = new \App\Student;
        $student->name = $validatedData['name'];
        $student->email = $validatedData['email'];
        $student->save();
        return response()->json(['sucess' => 'Add new data sucessfully']);
    }
    public function detail($id){
        $student = \App\Student::where('id', $id)->first();
        return response()->json($student);
    }
    public function search(Request $request){
        $student = \App\Student::query()->where('name', 'LIKE', "%{$request->q}%")->orWhere('email', 'LIKE', "%{$request->q}%")->get();
        return response()->json($student);
    }
    public function pfImage($pfName){
        $pfImage =  \Storage::disk('s3')->url('studentProfileImages/' . $pfName);
        return response()->json($pfImage);
    }
}
