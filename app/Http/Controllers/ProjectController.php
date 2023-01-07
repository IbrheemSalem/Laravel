<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        return view("index");
    }

    public function about(){

        return view("about");
    }

    public function marriage(){

        return view("marriage");
    }

    public function blog(){

        return view("blog");
    }

    public function news(){

        return view("news");
    }

    public function contact(){

        return view("contact");
    }
}
