<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class UserController extends Controller
{
    public function __construct(){
        // $this -> middleware('auth');
        $this -> middleware(function($request, $next){
            app() -> setLocale(Auth::user() -> language);
            return $next($request);
        }); 
    }
    public function index(){
        $data['users'] = DB::table('users')
            -> where('active', 1)
            -> paginate(3);
        return view('users.index', $data);
    }
    public function create(){
        return view('users.create');
    }
    public function do_logout(){
        Auth::logout();
        return redirect('login-form');
    }
    public function store(Request $r){
        $r -> validate([
            'username' => 'required|min:3|unique:users',
            'password' => 'required|min:3|max:12',
        ]);
        $data = array(
            'username' => $r -> username,
            'password' => bcrypt($r -> password),
            'email' => $r -> email,
            'language' => $r -> language
        );
        $result = DB::table('users')
            ->insert($data);
        if($result){
            return redirect() 
                -> route('user.create')
                -> with('success', 'Data has been inserted');
        }
        else{
            return redirect()
                -> route('user.create')
                -> with('error', 'Can not insert a record');
        }
    }
    public function delete($id){
        $result = DB::table('users')
            -> where('id', $id)
            -> update(['active' => 0]);
        if($result){
            return redirect()  
                -> route('user.index')
                -> with('success', 'Record has been deleted');
        }
        else{
            return redirect()
                -> route('user.index')
                -> with('error', 'Can not delete a record');
        }
    }
    public function edit($id){
        $data['user'] = DB::table('users')
            -> where('id', $id)
            -> first();
        return view('users.edit', $data);
    }
    public function update(Request $r, $id){
        $r -> validate([
            'username' => 'required',
        ]);
        $data = array(
            'username' => $r -> username,
            'email' => $r -> email,
            'language' => $r -> language
        );
        if($r -> password){
            $data['password'] = bcrypt($r -> password);
        }
        $result = DB::table('users')    
            -> where('id', $id)
            -> update($data);
        if($result){
            return redirect()  
                -> route('user.index')
                -> with('success', 'Record has been updated');
        }
        else{
            return redirect()
                -> route('user.edit', $id)
                -> with('error', 'Can not update a record');
        }
    }
    //user login using session
    /*public function login(){
        return view('users.login');
    }
    public function do_login(Request $re){
        $user_name = $re -> user_name;
        $password = md5($re -> password);
        $user = DB::table('tbl_user')
            ->where('username', $user_name)
            ->where('password', $password)
            ->first();
        if($user!=null){
            //have data
            session(['user' => $user]);//create session user = objects of user(1 record)
            return redirect('customer');
        }
        else{
            //no data
            session() -> flash('error', 'Invalided user name or password');
            return redirect('login');
        }
    }
    public function logout(Request $re){
        $re -> session() -> forget('user');
        $re -> session() -> flush(); 
        return redirect('login');
    }*/
}
