<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Teacher;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    private $training,$categories,$trainings;
    public function index(){
        $this->categories = Category::all();
        return view('teacher.training.index',['categories' => $this->categories]);
    }

    public function create(Request $request){

        training::newTraining($request);
        return  back()->with('message','New  training added successfully');
    }

    public function manage(){
        return view('teacher.training.manage');
    }

    public function edit($id){
        return view('teacher.training.edit');
    }


    public function update(Request $request,$id){
        return $request->all();
    }
    public function delete($id){
        return $id;
    }
}
