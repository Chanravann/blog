@extends('layouts.master')
@section('title')
    <title>Sell Product</title>
@endsection
@section('style')
    <style>
        .row{
            margin-bottom:10px;
        }
    </style>
@endsection
@section('content')
    <h3>Sell Products</h3>
    <hr>
    <form action="{{route('product.sell')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row">
                    <label for="txt_proname" class="col-sm-3">Product Name: </label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_proname" id="txt_proname" class="form-control" value="{{$name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txt_qty" class="col-sm-3">Quantity: </label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_qty" id="txt_qty" class="form-control" value="{{$qty}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txt_price" class="col-sm-3">Product Price ($): </label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_price" id="txt_price" class="form-control" value="{{$price}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txt_dis" class="col-sm-3">Discount (%): </label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_dis" id="txt_dis" class="form-control" value="{{$discount}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txt_total" class="col-sm-3">Total ($): </label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_total" id="txt_total" class="form-control" value="{{$total}}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-2">
                        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class='btn btn-primary'>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection