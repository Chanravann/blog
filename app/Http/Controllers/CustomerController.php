<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Image;
class CustomerController extends Controller
{   
    public function __construct(){
        $this -> middleware('auth'); 
    }
    public function index(){
        // if(session('user')==null){
        //     return redirect('login');
        // }
        $data['query'] = "";
        $data['customers'] = DB::table('tbl_customers')
            // ->select('id','name','gender','phone','email')
            // ->addselect('address','photo','active')
            // ->whereNull('phone') 
            // ->where('active', '=',1)
            // ->where('gender', 'M')
            // ->where('address', 'Takeo')
            // ->orWhere([//array with where condition
            //     ['id', '>', 3],
            //     ['address', '=', 'Takeo']
            // ])
            //grouping select
            // ->where('active', 1)
            // ->where(function($q){
            //     $q = $q ->where('name', 'like', '%a')
            //             ->orWhere('phone', 'like', "071%")
            //             ->orWhere('address', 'like', "k%");
            // })
            // innerJoin
            ->leftJoin('tbl_regions', 'tbl_customers.regions_id', '=', 'tbl_regions.id')
            ->where('tbl_customers.active', '=', 1)
            ->select('tbl_customers.*', 'tbl_regions.name as gname')
            ->orderBy('tbl_customers.id','desc')
            ->paginate(config('app.row'));
        // $row = $data['customers']->count();
        // for($i=0; $i<3; $i++){
        //     echo($data['customers'][$i]->id . "<br>");
        //     echo($data['customers'][$i]->name . "<br>");
        //     echo($data['customers'][$i]->gender . "<br>");
        //     echo($data['customers'][$i]->name . "<br>");
        //     echo($data['customers'][$i]->email . "<br>");
        //     echo($data['customers'][$i]->address . "<br>");
        //     echo("---------------------<br>");
        // }
        return view('customers.index', $data);
    }
    public function create(){ 
        $data['regions'] = DB::table('tbl_regions')->get();
        return view('customers.create', $data);
    }
    public function search(Request $r){
        $query_search = $r->query_search;
        $data['query'] = $query_search;
        $data['customers'] = DB::table('tbl_customers')
            ->where('active',1)
            ->where(function($query) use($query_search){ 
                $query = $query ->orWhere('name', 'like', "%{$query_search}%")
                                ->orWhere('gender', 'like', "%{$query_search}%")
                                ->orWhere('phone', 'like', "%{$query_search}%")
                                ->orWhere('email', 'like', "%{$query_search}%")
                                ->orWhere('address', 'like', "%{$query_search}%");
            })
            ->orderBy('id','desc')
            ->paginate(config('app.row'));
        return view('customers.index', $data);
    }
    public function save(Request $r){
        // $data=$r->except('_token','btn_submit');
        $data = array(
            'gender' => $r->gender,
            'name' => $r->name,          
            'phone' => $r->phone,
            'email' => $r->email,
            'address' => $r->address,
            'regions_id' => $r->regions
        );
        if($r -> photo){
            //crop picture using intervention
            $file = $r->file('photo');
            $ext = $file->getClientOriginalExtension();//get extension from file
            $file_name=md5(date('Y-m-d-h-i-s')) . "." . $ext;
            $image=Image::make($file->getRealPath())//$file->getRealPath(): ចាប់យក file ដែលត្រូវកាត់
                ->resize(720, null, function($aspect){//resize(width, height, closerfunction)
                    $aspect->aspectRatio(); //សំរាប់អោយរូបមានសមាមាត្រគ្នាទទឹងនិងកម្ពស់
                });
            $image -> save('upload/customer/' . $file_name, 80);
            $data['photo'] = "upload/customer/" . $file_name;
            // $data['photo']=$r->file('photo')->store('upload/customer','custom');
        }
        $insertDB = DB::table('tbl_customers')
            ->insert($data);
        if($insertDB){
            return redirect('customer/create')
                ->with('success','Record has been inserted!');
        }else{
            return redirect('customer')
                ->with('error','Fail to save!');
        }
    }
    public function edit($id){
        $regions = DB::table('tbl_regions') ->get();
        $customer=DB::table('tbl_customers')
            // ->where('id',$id)
            // ->first();
            ->find($id);
        return view("customers.edit", compact('customer', 'regions'));
    }
    public function delete($id){
        $delete = DB::table('tbl_customers')
            ->where('id',$id)
            ->update(['active'=>0]);
        if($delete){
            return redirect('customer')
                ->with('success','Record has been deleted!');
        }
        else{
            return redirect('customer')
                ->with('error','Can not delete a record!!');
        }
    }
    public function update(Request $r){
        $data=$r->except('_token','id','photo','btn_submit');
        if($r->photo){
            $data['photo']=$r->file('photo')->store('upload/customer','custom');
        }
        $result=DB::table('tbl_customers')    
            ->where('id',$r->id)
            ->update($data);
        if($result){
            return redirect('customer')
                ->with('success','Data has been updated!');
        }
        else{
            return redirect('customer/edit/'.$r->id)
                ->with('error','Can not update a record!!');
        }
    }
}
