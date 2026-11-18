<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    // public function login (){

    //     $data['logo'] = DB::table('tblsekolah')->limit(1)->first();
    //     return view('authen.login',$data);
    // }

    public function login()
    {
    	if(Auth::check())
    	{
    		return redirect('dashboard');
    	}else{
    		return view('login');
    	}
    }

    public function loginpage()
    {
        Auth::logout();
        return view('/login');
    }

    public function loginaksi(Request $request)
    {
    	$data = [
    		'email' => $request->input('username'),
    		'password' => $request->input('password')
    	];

    	if(Auth::Attempt($data))
    	{
    		return redirect('dashboard');
    	}else{
    		Session::flash('error','Username atau Password Salah');
    		return redirect('/');
    	}
    }

    public function logoutaksi()
    {
    	Auth::logout();
    	return redirect('/');
    }

}
