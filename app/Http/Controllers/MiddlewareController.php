<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MiddlewareController extends Controller
{

    public function adualt()
    {

        return view('middlewar.index');
    }

    public function notadualt()
    {

        return view('middlewar.notauthorized');
    }

    public function site()
    {

        return view('middlewar.site');
    }

    public function admin()
    {

        return view('admin');
    }






    public function AdminLogin()
    {

        return view('middlewar.adminlogin');
    }


    public function CheckAdminLogin(Request $request)
    {

    $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
    ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){

            return redirect()->intended('/admin_middleware');
        }

        return back()->withInput($request->only('email'));
    }

}
