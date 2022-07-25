@extends('layouts.master')
@section('title')
    <title>Create Customer</title>
@endsection
@section('style')
    <style>
        input[type="text"]{
            margin-bottom: 20px;
        }
        input[type='file']{
            margin-bottom: 20px;
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
        #img{
            background-color: #ccc;
            margin-bottom: 20px;
        }
    </style>
@endsection
@section('content')
    <h3 class='text-secondary'>Create Customer</h3>
    <hr>
    <a href="{{url('customer')}}" class="btn btn-danger btn-back">
        <i class="fa-solid fa-angle-left"></i>&nbsp;&nbsp;Back
    </a> 
    @component('component.msgcomponent')
    @endcomponent
    <form action="{{url('customer/save')}}" method="POST" autocomplete="off" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row">
                    <label for="name" class="col-sm-3">Name <span class="text-danger"> * </span></label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="cus_name" class="form-control" required autofocus placeholder="Your real name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-sm-3">Gender <span class="text-danger"> * </span></label>
                    <div class="col-sm-8">
                        <select name="gender" id="cus_gender" class="form-select">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-3">Phone</label>
                    <div class="col-sm-8">
                        <input type="text" name="phone" id="cus_phone" class="form-control" placeholder="Optional">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Optional">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="regions" class="col-sm-3">Regions</label>
                    <div class="col-sm-8">
                        <select name="regions" id="" class='form-select'>
                            <option value="0"></option>
                            @foreach($regions as $re)
                            <option value="{{$re -> id}}">{{$re -> name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-3">Address</label>
                    <div class="col-sm-8">
                        <textarea name="address" id="cus_address" class="form-control" cols="30" rows="2" >
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-3">Photo</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" name="photo" onchange='previewPhoto(event)'>
                        <div id="pic">
                            <img src="" alt="" id='img' width="150">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3"></label>
                    <div class="col-sm-8">
                        <input type="submit" class="btn btn-primary" value="Submit" name="btn_submit">
                    </div>
                </div>
            </div>
        </div>
    </form>
    @section('javascript')
        <script>
            function previewPhoto(evt){
                let img=document.getElementById('img');
                img.src=URL.createObjectURL(evt.target.files[0]);
            }
            document.getElementById('img').innerHTML=img;
        </script>
    @endsection
@endsection