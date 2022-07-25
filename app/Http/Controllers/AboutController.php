<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
    }
    public function index(){
        //option1 set data to view
        // $company="My company is near the hospital";
        // return view('about',compact('company'));
        //option2 set data to view
        $company['name']="Rean Web";
        $company['description']="we are to do good work and do somthing to develop my company!!";
        $company['address']="My Company is near the hospital";
        $company['position']="bulid web and app";
        return view('about',$company);
    }
}
