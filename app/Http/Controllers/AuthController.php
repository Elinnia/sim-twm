<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Cache;
class AuthController extends BaseController
{
    public function index(){
        $param = array();
        return view("pages/auth/login")->with($param);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'user_email' => 'required',
            'user_password' => 'required'
        ]);

        if ($validator->fails()) {
             Session::flash('error', 'Email dan password wajib di isi');
             return redirect('/auth/login');
        }   
        $request_login = array(
            "user_email" => $request->get("user_email"),
            "password" => $request->get("user_password"),
              
        );
        $auth = Auth::attempt($request_login);
        if(!$auth){
             Session::flash('error', 'Akun tidak ditemukan');
            return redirect('/auth/login');
        }
        $user = Auth::user();
        Session::put("auth",$user);
        return redirect('/dashboard');

    }

    public function logout(){
        Auth::logout();
        Session::forget('auth');
        Session::flush();
        Cache::flush();

        return redirect()->route('auth.index');
    }
}
