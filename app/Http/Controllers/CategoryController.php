<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this -> middleware('auth');
    }
    public function home()
    {
        $category=DB::table('tbl_categories')
            -> where('active',1)
            -> paginate(config('app.row_cat'));
        return view('categories.home', compact('category'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data=array(
            'name'=> $request -> name
        );
        $i=DB::table('tbl_categories')
            ->insert($data);
        if($i){
            session()->flash('success', 'Recorde has been inserted!');
            return redirect()->route('category.create');
        }
        else{
            seesion()->flash('error', "Can't insert a record!!!");
            return redirect('category/create')->withInput();
        }
    }

    public function show($id)
    {
        //
    }
    public function index()
    {
        //
    }
    public function edit($id)
    {
        $cat=DB::table('tbl_categories')->find($id);
        return view('categories.edit', compact('cat'));
    }

    public function update(Request $request, $id)
    {
        $data = array(
            'name' => $request -> name
        );
        $r = DB::table('tbl_categories')
            ->where('id', $id)
            ->update($data);
        if($r){
            session()->flash('success', 'Update successfully!!');
            return redirect()->route('category.index');
        }
        else{
            session()->flash('error', "Can't update a record!!");
            return redirect()->route('category.edit', $id);
        }
    }

    public function delete($id)
    {
        $r=DB::table('tbl_categories')
            ->where('id',$id)
            ->update(['active' => 0]);
        if($r){
            session()->flash('success','Record has been deleted!!');
            return redirect()->route('category.index');
        }
        else{
            seesion()->flash('error', "Can't delete a record!!");
            return redirect()->route('category.index');
        }
    }
}
