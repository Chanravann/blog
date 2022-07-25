@extends('layouts.master')
@section('title')
    <title>Product list</title>
@endsection
@section('style')   
    <style>
        h3{
            margin: 20px 0px;
        }
        table{
            margin-top: 15px;
        }
        .pagination{
            margin: auto;
        }
        .btn-create{
            margin: 15px 0;
        }
        .btn-search{
            margin:0px;
            padding: 0px;
        }
    </style>
@endsection
@section('content')
    <h3 class='text-primary'>Product list</h3>
    <hr>
    @component('component.msgcomponent')
    @endcomponent
    <div class="btn-create row">
        <div class="col-1">
            <div class="form-group row">
            <a href="{{route('product.create')}}" class='btn btn-primary'>
                <i class='fas fa-plus'></i>&nbsp;Create
            </a>
            </div>
        </div>
        <div class="col-6"></div>
        <div class="col-5">
           <form action="">
                <div class="form-group row">
                    <div class="col-10">
                        <input type="text" name="search" id="" value="" class='form-control' placeholder='Input anything you want to search'>
                    </div>
                    <div class="col-2 form-group row btn-search">
                        <input type="submit" value="Search" class='btn btn-secondary'>
                    </div>
                </div>
           </form>
        </div>
    </div>
    <table class="table table-dark">
        <tr class="text-primary">
            <th>N&#176;</th>
            <th>Name</th>
            <th>Price</th>
            <th>Barcode</th>
            <th>Categories</th>
            <th>Qty</th>
            <th>Description</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Code</th>
            <th>Actions</th>
        </tr>
        @php($i=1)
        @foreach($products as $product)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$product -> name}}</td>
            <td>{{$product -> price}}</td>
            <td>
                {{--<img src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->barcode, 'C39', 1.5, 40, array(238,238,238))}}">--}}
                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($product->barcode, 'QRCODE', 50, 50, array(238,238,238))}}" width='50px'>
            </td>
            <td>{{$product -> cname}}</td>
            <td>{{$product -> quantity}}</td>
            <td>{{substr($product -> description, 0, 10) . "..."}}</td>
            <td>{{substr($product -> created_at, 0, 5)}}</td>
            <td>{{substr($product -> updated_at, 0, 5)}}</td>
            <td>{{$product -> code}}</td>
            <td>
                <a href="{{route('product.edit', $product -> id)}}" class='btn btn-sm btn-primary'>Edit</a>
                <a href="{{route('product.delete', $product -> id)}}" class='btn btn-sm btn-danger' onclick="return confirm('Are you sure? You want to delete??')">Delete</a>
            </td>
        </tr>
        @endforeach
        
    </table>
    <div class="pagination">
        {{$products -> links()}}
    </div>
@endsection