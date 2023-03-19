<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('website.home.index');

    }

    public function about(){
        return view('website.about.index');
    }

    public function trainingCategory(){
        return view('website.training-category.index');
    }

}
