<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::latest()->get();
        return view('test01.index', compact('student'));
    }

    public function create()
    {
        return view('test01.create');
    }

    public function store(Request $request)
    {
        $student = $request->validate([
            
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'number' => 'required|digits:10',
            'company' => 'required',
            'notes' => 'required',
            'profile_image' => 'required',
        ]);

        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->number = $request->input('number');
        $student->company = $request->input('company');
        $student->notes = $request->input('notes');
        if($request->hasfile('profile_image'))
        {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }
        $student->save();
        return redirect()->back()->with('status','Notes Added Successfully');
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('test01.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        
        $student = $request->validate([
            
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'number' => 'required|digits:10',
            'company' => 'required',
            'notes' => 'required',
            'profile_image' => 'required',
        ]);

        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->number = $request->input('number');
        $student->company = $request->input('company');
        $student->notes = $request->input('notes');

        if($request->hasfile('profile_image'))
        {
            $destination = 'uploads/students/'.$student->profile_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/students/', $filename);
            $student->profile_image = $filename;
        }

        $student->update();
        return redirect()->back()->with('status','Updated Successfully');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $destination = 'uploads/students/'.$student->profile_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $student->delete();
        return redirect()->back()->with('status','Deleted Successfully');
    }

}