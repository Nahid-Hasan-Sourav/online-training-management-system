<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryCotroller extends Controller
{
    //
    private $category;
    public function index(){
        return view('admin.category.index');
    }

    public function create(Request $request){
        category::addNewCategory($request);
        return  back()->with('message','New  category added successfully');
    }

    public function manage(){
        $this->category = Category::all();
        return view('admin.category.manage',['categories'=>$this->category]);
    }

    public function edit($id){
        $this->category = Category::find($id);
        return view('admin.category.edit',['category',$this->category]);
    }

    public function update(Request $request,$id){

    }

    public function delete($id){

    }

}
