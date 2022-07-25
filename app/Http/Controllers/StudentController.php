<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this -> middleware('auth');
    }
    public function index()
    {
        // if(session('user')==null){
        //     return redirect('login'); 
        // }
        $data['students'] = DB::table('tbl_students')
            ->where('active', 1)
            ->paginate(config('app.stu_row'));
            $data['query'] = "";
        $data['min_score'] = DB::table('tbl_students')
            ->where('active', 1)
            ->count('score');
        return view('students.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            'name' => $request -> name,
            'gender' => $request -> gender,
            'phone' => $request -> phone,
            'email' => $request -> gmail,
            'address' => $request -> address,
            'score' => $request -> score
        );
        if($request -> photo){//ប្រសិនបើមាន photo upload មក
            $file = $request -> file('photo');
            $extension = $file->getClientOriginalExtension();//ចាប់យក extension របស់ file
            $file_name=date('Y-m-d-h-i-s') . '.' . $extension;
            $Image =Image::make($file -> getRealPath()) -> resize(500, null, function($aspect){
                $aspect->aspectRatio();
            });
            $Image -> save('upload/student/' . $file_name, 80);
            $data['photo'] = "upload/student/". $file_name;
        }
        $r = DB::table("tbl_students")
            -> insert($data);
        if($r){
            return redirect()
                ->route('student.index')
                ->with('success','Record has been inserted!');
        }else{
            return redirect()
                ->route('student.create')
                ->with('error','Fail to save!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function search(Request $r){
        $query_search = $r -> search;
        $data['query'] =  $query_search;
        $data['students'] = DB::table('tbl_students')
            ->where('active', 1)
            ->where(function($query) use($query_search){
                $query = $query -> orWhere('name', 'like', "%{$query_search}%")
                                -> orWhere('gender', 'like', "%{$query_search}%")
                                -> orWhere('phone', 'like', "%{$query_search}%")
                                -> orWhere('email', 'like', "%{$query_search}%")
                                -> orWhere('address', 'like', "%{$query_search}%")
                                -> orWhere('score', 'like', "%{$query_search}%");
            })
            -> paginate(config('app.stu_row'));
            return view('students.index', $data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = DB::table('tbl_students')
            ->find($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array(
            'name' => $request -> name,
            'gender' => $request -> gender,
            'phone' => $request -> phone,
            'email' => $request -> email,
            'address' => $request -> address,
            'score' => $request -> score
        );
        if($request -> photo){//ប្រសិនបើមាន photo upload មក
            $file = $request -> file('photo');
            $extension = $file->getClientOriginalExtension();//ចាប់យក extension របស់ file
            $file_name=date('Y-m-d-h-i-s') . '.' . $extension;
            $Image = Image::make($file -> getRealPath()) -> resize(500, null, function($aspect){
                $aspect->aspectRatio();
            });
            $Image -> save('upload/student/' . $file_name, 80);
            $data['photo'] = "upload/student/". $file_name;
        }
        $r = DB::table('tbl_students')
            ->where('id', $id)
            ->update($data);
        if($r){
            return redirect()
                ->route('student.index')
                ->with('succes','Record has been updated!');
        }else{
            return redirect()
                ->route('student.edit', $id)
                ->with('error','Fail to update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $r = DB::table('tbl_students')
            ->where('id', $id)
            ->update(['active' => 0]);
        if($r){
            return redirect() -> route('student.index')
                ->with('del_true','Data has been deleted!');
        }
        else{
            return redirect() -> route('student.index')
                ->with('del_false','Can not update a record!!');
        }
    }
}
