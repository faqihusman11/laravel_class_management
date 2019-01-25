<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Session;
use PDF;

class ClassroomController extends Controller
{
    
    public function listClassrooms()
    {
        $classrooms = Classroom::orderBy('id', 'asc')->paginate(5);       
        return view('classrooms.list_classrooms')->with('classrooms', $classrooms);
    }

    public function createClassroom()
    {
        $teachers = Teacher::all();
        return view('classrooms.create_classrooms')->with('teachers', $teachers);
    }

    public function addClassroom(Request $add)
    {
        validator::make($add->all(),
        [
            "class_name" => "required|min:3",
            "teacher_id" => "required"
        ],
        [
            "class_name.required" => "Name fields are required",
            "class_name.min" => "At least 3 characters",

            "teacher_id.required" => "Teacher fields are required"
        ])->validate();

        $name = $add->input('class_name');
        $teacher = $add->input('teacher_id');

        $classroom = new Classroom;
        $classroom->class_name = $name;
        $classroom->teacher_id = $teacher;
        $classroom->save();
        
        Session::flash('status', 'Added');
        Session::flash('type', 'success');
        return redirect('/listClassrooms');
    }

    public function editClassroom($id)
    {
        $classroom = Classroom::find($id);

        $teachers = Teacher::all();
        $classroom->teacher = $teachers;

        return view ('classrooms.edit_classrooms')->with('classroom', $classroom);
    }

    public function updateClassroom(Request $update)
    {   
        validator::make($update->all(),
        [
            "class_name" => "required|min:3",
            "teacher_id" => "required"
        ],
        [
            "class_name.required" => "Name fields are required",
            "class_name.min" => "At least 3 characters",

            "teacher_id.required" => "Teacher fields are required"
        ])->validate();

        $id = $update->input('id');
        $name = $update->input('class_name');
        $teacher = $update->input('teacher_id');
        
        $classroom = Classroom::find($id);
        $classroom->class_name = $name;
        $classroom->teacher_id = $teacher;
        $classroom->save();

        Session::flash('status', 'Updated');
        Session::flash('type', 'success');
        return redirect('/listClassrooms');
    }

    public function deleteClassroom(Request $delete)
    {
        $classroom_id = $delete->input('id');

        $classroom = Classroom::find($classroom_id);
        $classroom->delete();

        Session::flash('status', 'Deleted');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function downloadPDF() {
        $classrooms = Classroom::all();
        $pdf = PDF::loadView('classrooms.pdf', ['classrooms'=>$classrooms]);
        return $pdf->download('List Classrooms.pdf');
    }
}
