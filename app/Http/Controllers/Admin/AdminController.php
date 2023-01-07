<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;
    /*
    public function __construct(){

        //$this->middleware('auth')
        //OR
        //$this->middleware('auth')->except('ShowNaddilwer0' OR 'ShowNaddilwer1' .. .. . . . . .. );
    }
    */
    public function ShowAdminew(){

        return "new show admin";
    }

    public function ShowNaddilwer0(){

        return "new show admin 0";
    }
    public function ShowNaddilwer1(){

        return "new show admin 1";
    }
    public function ShowNaddilwer2(){

        return "new show admin 2";
    }
    public function ShowNaddilwer3(){

        return "new show admin 3";
    }





}

