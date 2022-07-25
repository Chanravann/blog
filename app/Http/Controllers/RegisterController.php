<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function save(Request $r){//Request object will be store all infor that form submit
        //$r->all();//បង្ហាញរាល់fields ទាំងអស់របស់ FORM
        //$r->input();//បង្ហាញរាល់ input ទាំងអស់របស់ FORM
        $name=$r->txt_name;
        $phone=$r->txt_phone;
        echo $name."<br>";
        echo $phone;
        $data=$r->except('_token');//exceptចាប់ data លើកលែង FIELD _token
        dd($data);
    }
}
