<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index(){
        return view('teacher.training.index');
    }

    public function create(Request $request){
        return $request->all();
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
