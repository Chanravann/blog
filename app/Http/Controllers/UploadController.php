<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class UploadController extends Controller
{
    public function index(){
        return view('upload');
    }
    public function save(Request $r){
        //upload 1 file
        // if($r->photo){
        //     $file=$r->file('photo')->store('upload', 'custom');//1.custom is profile configuration 2.upload folder file
        //     // session()->flash('success','File has been uploaded!');
        //     Session::flash('success','File has been uploaded!');
        //     return redirect('uploadfile'); 
        // }
        //upload multiple files
        if($r->photo){
            $files=$r->file('photo');
            foreach($files as $file){
                $file->store('upload','custom');
            }
            Session::flash('success','File has been uploaded!');
            return redirect('uploadfile');
        }
        else{
            return redirect('uploadfile')->with('error', "Please select a file!!!");
            //note:flash method and with method store data in seesion
        } 
    }
}
