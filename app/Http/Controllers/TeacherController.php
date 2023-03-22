<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    private $teacher;
    public function index(){
        return view('admin.teacher.index');
    }

    public function manage(){
            $this->teacher = Teacher::all();

        return view('admin.teacher.manage',['allTeachers'=>$this->teacher]);
    }

    public function createTeacher(Request $request){
//        return $request->all();

        teacher::newTeacher($request);
        return  back()->with('message','Teacher added successfully');

    }

    public function editTeacher($id){
        $this->teacher = Teacher::find($id);
        return view('admin.teacher.edit',['teacher'=>$this->teacher]);
    }

    public function updateTeacher(Request $request,$id){
        Teacher::updateTeacher($request,$id);
        return redirect('/teacher/manage')->with('message','Teacher info update successfully');
    }

    public function delete($id){
        Teacher::deleteTeacher($id);
//        return back()->with('message',' Teacher delete successfully ');
        return redirect('/teacher/manage')->with('message', 'Teacher delete successfully');
    }

}
