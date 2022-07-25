<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product; 
use DB;
class productController extends Controller
{
    public function __construct(){
        $this -> middleware('auth');
    }
    public function index(){
        $data['products'] = Product::join('tbl_categories', 'products.category_id', 'tbl_categories.id')
            -> select("products.*", "tbl_categories.name as cname")
            -> where('products.active', 1)
            -> paginate('2');
        return view('products.index', $data);
    }
    public function create(){
        $data['category'] = DB::table('tbl_categories')
            ->get();
        return view('products.create', $data);
    }

    public function store(Request $r){
        $r -> validate([
            'barcode' => 'min:3|max:4'
        ]);
        $product = new Product();//create product object from Product class(model)
        $product -> name = $r -> name;
        $product -> price = $r -> price;
        $product -> quantity = $r -> quantity;
        $product -> barcode = $r -> barcode;
        $product -> category_id = $r -> category;
        $product -> description = $r -> description;
        $product -> code = $r -> code;
        $result = $product -> save();//insert into table
        if($result){
            return redirect('product') 
                -> with('success', 'Data has been insert successfully!!!');
        }
        else{
            return redirect('product/create')
                -> with('error', 'Can not insert a record!!!!');
        }
    }

    public function edit($id){
        $data['product'] = Product::find($id);//find id in table product if have it return one record to store in associative array
        $data['category'] = DB::table("tbl_categories")
            -> where('active', 1)
            ->get();
        return view('products.edit', $data);
    }

    public function update(Request $r, $id){
        $r -> validate([
            'barcode' => 'min:3|max:4'
        ]);
        $product = Product::find($id);
        $product -> name = $r -> name;
        $product -> price = $r -> price;
        $product -> quantity = $r -> quantity;
        $product -> barcode = $r -> barcode;
        $product -> category_id = $r -> category;
        $product -> description = $r -> description;
        $product -> code = $r -> code;
        $result = $product -> save();
        if($result){
            return redirect()
                ->route('product.index')
                -> with('success', 'Data has been update successfully!!!');
        }
        else{
            return redirect()
                -> route('product.edit', $id)
                -> with('error', 'Can not update a record!!!!');
        }
    }
    
    public function delete($id){
        // $product = Product::find($id);
        // $result = $product -> delete();//not recomment
        $result = Product::where('id', $id)
            ->update(['active' => 0]);
        if($result){
            return redirect() -> route('product.index')
                -> with('success', 'Record has been successfully');
        }
        else{
            return redirect() 
                -> route('product.index')
                -> with('error', 'Can not delete');
        }
    }
}
