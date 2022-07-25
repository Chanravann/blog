@extends('layouts.master')
@section('title')
    <title>Create Category</title>
@endsection
@section('style')
    <style>
        input[type="text"]{
            margin-bottom: 20px;
        }
        .btn-back{
            margin-bottom: 30px;
        }
        h3{
            margin-bottom:20px;
            margin-top:20px;
        }
    </style>
@endsection
@section('content')
    <h3 class='text-secondary'>Create Category</h3>
    <hr>
    <a href="{{url('category')}}" class="btn btn-danger btn-back">
        <i class="fa-solid fa-angle-left"></i>&nbsp;&nbsp;Back
    </a> 
    @component('component.msgcomponent')
    @endcomponent
    <form action="{{route('category.store')}}" method="POST" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row">
                    <label for="name" class="col-sm-3">Name <span class="text-danger"> * </span></label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="cus_name" class="form-control" required autofocus placeholder="input category name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-8">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </form>
    @section('javascript')

    @endsection
@endsection