@extends('layouts.master')
@section('title')
    <title>Edite Customer</title>
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('chosen-jquery-plugin/chosen.min.css')}}">
    <style>
        input[type="text"]{
            margin-bottom: 20px;
        }
        input[type='file']{
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .btn-back{
            margin-bottom: 30px;
        }
        textarea{
            margin-bottom: 20px;
        }
        select{
            margin-bottom: 20px;
        }
        h3{
            margin-bottom:20px;
            margin-top:20px;
        }
    </style>
@endsection
@section('content')
    <h3 class='text-secondary'>Edit Customer</h3>
    <hr>
    <a href="{{url('customer')}}" class="btn btn-danger btn-back">
        <i class="fa-solid fa-angle-left"></i>&nbsp;&nbsp;Back
    </a> 
    @component('component.msgcomponent')
    @endcomponent
    <form action="{{url('customer/update')}}" method="POST" autocomplete="off" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name="id" value="{{$customer->id}}" id='cus_id'>
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row">
                    <label for="name" class="col-sm-3">Name <span class="text-danger"> * </span></label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="cus_name" class="form-control" required autofocus placeholder="Your real name" value="{{$customer->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-sm-3">Gender <span class="text-danger"> * </span></label>
                    <div class="col-sm-8">
                        <select name="gender" id="cus_gender" class="form-control">
                            <option value="M" {{$customer->gender=="M"?'selected':''}}>Male</option>
                            <option value="F" {{$customer->gender=="F"?'selected':''}}>Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-3">Phone</label>
                    <div class="col-sm-8">
                        <input type="text" name="phone" id="cus_phone" class="form-control" placeholder="Optional" value="{{$customer->phone}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Optional" value="{{$customer->email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-3">Address</label>
                    <div class="col-sm-8">
                        <textarea name="address" id="cus_address" class="form-control" cols="30" rows="2">
                            {{$customer->address}}
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="regions" class="col-sm-3">Regions</label>
                    <div class="col-sm-8">
                        <select name="regions_id" id="select-style" class='form-select chosen-select'>
                            <option value="0"></option>
                            @foreach($regions as $re)
                                <option value="{{$re -> id}}" {{$re->id==$customer->regions_id?"selected":""}}>{{$re -> name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-3">Photo</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="photo" onchange="previewPhoto(event)">
                        <p>
                            <img src="{{asset($customer->photo)}}" alt="" width="150" id='img'>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-8">
                        <input type="submit" class="btn btn-primary" value="Update" name="btn_submit" id='btn_update'>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @section('javascript')
    <script src="{{asset('chosen-jquery-plugin/chosen.jquery.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.chosen-select').chosen();
        });
        function previewPhoto(evt){
            let img=document.getElementById('img');
            img.src=URL.createObjectURL(evt.target.files[0]);
        }
        document.getElementById('img').innerHTML=img;
    </script>
    @endsection
@endsection