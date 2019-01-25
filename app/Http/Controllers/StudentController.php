<?php

namespace App\Http\Controllers;

use App\Student;
use App\Classroom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Session;

class StudentController extends Controller
{
    
    public function listStudents()
    {
        $students = Student::orderBy('id', 'asc')->paginate(5);
        return view('students.list_students')->with('students', $students);
    }

    public function createStudent()
    {
        $classrooms = Classroom::all();
        return view('students.create_students')->with('classrooms', $classrooms);
    }

    public function addStudent(Request $add)
    {
        validator::make($add->all(),
        [
            "student_name" => "required|min:3|alpha",
            "student_age" => "required|digits_between:0,2",
            "student_gender" => "required",
            "classroom_id" => "required"
        ],
        [
            "student_name.required" => "Name fields are required",
            "student_name.min" => "At least 3 characters",
            "student_name.alpha" => "Name must be alphabetic characters",

            "student_age.required" => "Age fields are required",
            "student_age.digits_between" => "Age must be 0-99",

            "student_gender.required" => "Gender fields are required",

            "classroom_id.required" => "Classroom fields are required"
        ])->validate();

        $name = $add->input('student_name');
        $age = $add->input('student_age');
        $gender = $add->input('student_gender');
        $classroom = $add->input('classroom_id');

        $student = new Student;
        $student->student_name = $name;
        $student->student_age = $age;
        $student->student_gender = $gender;
        $student->classroom_id = $classroom;
        $student->save();
        
        Session::flash('status', 'Added');
        Session::flash('type', 'success');
        return redirect('/listStudents');
    }

    public function editStudent($id)
    {
        $student = Student::find($id);

        $classrooms = Classroom::all();
        $student->classroom = $classrooms;

        return view ('students.edit_students')->with('student', $student);
    }

    public function updateStudent(Request $update)
    {   
        validator::make($update->all(),
        [
            "student_name" => "required|min:3|alpha",
            "student_age" => "required|digits_between:0,2",
            "student_gender" => "required",
            "classroom_id" => "required"
        ],
        [
            "student_name.required" => "Name fields are required",
            "student_name.min" => "At least 3 characters",
            "student_name.alpha" => "Name must be alphabetic characters",

            "student_age.required" => "Age fields are required",
            "student_age.digits_between" => "Age must be 0-99",

            "student_gender.required" => "Gender fields are required",

            "classroom_id.required" => "Classroom fields are required"
        ])->validate();

        $id = $update->input('id');
        $name = $update->input('student_name');
        $age = $update->input('student_age');
        $gender = $update->input('student_gender');
        $classroom = $update->input('classroom_id');
        
        $student = Student::find($id);
        $student->student_name = $name;
        $student->student_age = $age;
        $student->student_gender = $gender;
        $student->classroom_id = $classroom;
        $student->save();

        Session::flash('status', 'Updated');
        Session::flash('type', 'success');
        return redirect('/listStudents');
    }

    public function deleteStudent(Request $delete)
    {
        $student_id = $delete->input('id');

        $student = Student::find($student_id);
        $student->delete();

        Session::flash('status', 'Deleted');
        Session::flash('type', 'success');
        return redirect()->back();
    }
}
