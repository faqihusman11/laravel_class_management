<?php

namespace App\Http\Controllers;

use App\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Session;

class TeacherController extends Controller
{
    
    public function listTeachers()
    {
        $teachers = Teacher::orderBy('id', 'asc')->paginate(5);
        return view('teachers.list_teachers')->with('teachers', $teachers);
    }

    public function createTeacher()
    {
        return view('teachers.create_teachers');
    }

    public function addTeacher(Request $add)
    {
        validator::make($add->all(),
        [
            "teacher_name" => "required|min:3|alpha",
            "teacher_age" => "required|digits_between:0,2",
            "teacher_gender" => "required"
        ],
        [
            "teacher_name.required" => "Name fields are required",
            "teacher_name.min" => "At least 3 characters",
            "teacher_name.alpha" => "Name must be alphabetic characters",

            "teacher_age.required" => "Age fields are required",
            "teacher_age.digits_between" => "Age must be 0-99",

            "teacher_gender.required" => "Gender fields are required"
        ])->validate();

        $name = $add->input('teacher_name');
        $age = $add->input('teacher_age');
        $gender = $add->input('teacher_gender');

        $teacher = new Teacher;
        $teacher->teacher_name = $name;
        $teacher->teacher_age = $age;
        $teacher->teacher_gender = $gender;
        $teacher->save();
        
        Session::flash('status', 'Added');
        Session::flash('type', 'success');
        return redirect('/listTeachers');
    }

    public function editTeacher($id)
    {
        $teacher = Teacher::find($id);
        return view ('teachers.edit_teachers')->with('teacher', $teacher);
    }

    public function updateTeacher(Request $update)
    {   
        validator::make($update->all(),
        [
            "teacher_name" => "required|min:3|alpha",
            "teacher_age" => "required|digits_between:0,2",
            "teacher_gender" => "required"
        ],
        [
            "teacher_name.required" => "Name fields are required",
            "teacher_name.min" => "At least 3 characters",
            "teacher_name.alpha" => "Name must be alphabetic characters",

            "teacher_age.required" => "Age fields are required",
            "teacher_age.digits_between" => "Age must be 0-99",

            "teacher_gender.required" => "Gender fields are required"
        ])->validate();

        $id = $update->input('id');
        $name = $update->input('teacher_name');
        $age = $update->input('teacher_age');
        $gender = $update->input('teacher_gender');
        
        $teacher = Teacher::find($id);
        $teacher->teacher_name = $name;
        $teacher->teacher_age = $age;
        $teacher->teacher_gender = $gender;
        $teacher->save();

        Session::flash('status', 'Updated');
        Session::flash('type', 'success');
        return redirect('/listTeachers');
    }

    public function deleteTeacher(Request $delete)
    {
        $teacher_id = $delete->input('id');

        $teacher = Teacher::find($teacher_id);
        $teacher->delete();

        Session::flash('status', 'Deleted');
        Session::flash('type', 'success');
        return redirect()->back();
    }
}
