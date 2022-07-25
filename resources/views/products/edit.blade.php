@extends('layouts.master')
@section('title')
    <title>Edit Product</title>
@endsection
@section('style')   
    <style>
       h3{
            margin: 20px 0px;
        }
        .btn-back{
            margin: 15px 0;
        }
        input[type="text"]{
            margin-bottom: 20px;
        }
        input[type='file']{
            margin-bottom: 20px;
        }
        textarea{
            margin-bottom: 20px;
        }
        select{
            margin-bottom: 20px;
        }
    </style>
@endsection
@section('content')
    <h3 class='text-primary'>Edit Product</h3>
    <hr>
    @component('component.msgcomponent')
    @endcomponent
    <div class="btn-back row">
        <div class="col-1">
            <div class="form-group row">
            <a href="{{route('product.index')}}" class='btn btn-danger'>
                <i class='fa-solid fa-angle-left'></i>&nbsp;&nbsp;&nbsp;Back
            </a>
            </div>
        </div>
        <div class="col-6"></div>
    </div>
    <form action="{{route('product.update', $product -> id)}}" method="POST" autocomplete="off">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row">
                    <label for="name" class="col-sm-3">Product Name<span class="text-danger"> * </span></label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="name" class="form-control" required autofocus  value="{{$product -> name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-3">Product Price<span class="text-danger"> * </span></label>
                    <div class="col-sm-8">
                        <input type="text" name="price" id="price" class="form-control" required value="{{$product -> price}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="barcode" class="col-sm-3">Barcode<span class="text-danger"> * </span></label>
                    <div class="col-sm-8">
                        <input type="text" name="barcode" id="barcode" class="form-control" required value="{{$product -> barcode}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="quantity" class="col-sm-3">Quantity<span class="text-danger"> * </span></label>
                    <div class="col-sm-8">
                        <input type="text" name="quantity" id="quantity" class="form-control" required value="{{$product -> quantity}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-3">Category</label>
                    <div class="col-sm-8">
                        <select name="category" id="category" class="form-select" required> 
                            <option value="0">Select One</option>
                            @foreach($category as $cat)
                                <option value="{{$cat-> id}}" {{($cat->id)==($product->category_id)? "selected":""}}>{{$cat -> name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-3">Description</label>
                    <div class="col-sm-8">
                        <textarea name="description" id="mytextarea" cols="30" rows="3" class='form-control form-floating'>
                            {{$product -> description}}
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="code" class="col-sm-3">Product Code<span class="text-danger"> * </span></label>
                    <div class="col-sm-8">
                        <input type="text" name="code" id="code" class="form-control" required value="{{$product -> code}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-8">
                        <input type="submit" class="btn btn-primary" value="Update">
                        <input type="button" class="btn btn-danger" value="Clear" onclick="clearVal()">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('javascript')
    <script>
        let des = document.getElementById('mytextarea').innerHTML;
        document.getElementById('mytextarea').innerHTML =des.trim();
        function clearVal(){
            document.getElementById('name').value='';
            document.getElementById('price').value='';
            document.getElementById('barcode').value='';
            document.getElementById('quantity').value='';
            document.getElementById('category').selectedIndex=0;
            document.getElementById('mytextarea').value="";
            document.getElementById('code').value="";
            
        }
    </script>
@endsection