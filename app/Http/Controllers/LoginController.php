<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function login_form(){
        return view('users.login-form');
    }
    public function do_login(Request $r){
        // $tbl_user = $r -> only('username', 'password');//យកតែ field username and password តែប៉ុណ្ណោះ
        if(Auth::attempt(['username' => $r -> username, 'password' => $r -> password, 'active' => 1])){
            //login success
            return redirect() -> intended();
        }else{
            //login fail
            return redirect() -> route('login') -> with('error', "Ivalided username or password!!");
        }
    }
}
