@extends('layouts.master')
@section('title')
    <title>Edie User</title>
@endsection
@section('style')   
    <style>
        h3{
            margin: 20px 0px;
        }
        .btn-back{
            margin: 15px 0 ;
        }
        input[type="text"]{
            margin-bottom: 20px;
        }
        input[type='password']{
            margin-bottom: 20px;
        }
        select{
            margin-bottom: 20px;
        }
        
    </style>
@endsection
@section('content')
    <h3 class='text-primary'>Edit User</h3>
    <hr>
    <div class="btn-back row">
        <div class="col-1">
            <div class="form-group row">
                <a href="{{route('user.index')}}" class='btn btn-danger'>
                    <i class='fa-solid fa-angle-left'></i>&nbsp;&nbsp;Back
                </a>
            </div>
        </div>
    </div>
    @component('component.msgcomponent')
    @endcomponent
    <form action="{{route('user.update', $user -> id)}}" method="POST" autocomplete="off">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group row">
                    <label for="name" class="col-sm-3">User Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="username" id="username" class="form-control" required autofocus value="{{$user -> username}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3">Password</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" id='password' class="form-control" placeholder="Keep blank to use old password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3">Email<span class="text-danger"> * </span></label>
                    <div class="col-sm-8">
                        <input type="text" name="email" id='email' class="form-control" required value="{{$user -> email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="language" class="col-sm-3">Languages</label>
                    <div class="col-sm-8">
                        <select name="language" id="language" class="form-select" required > 
                            <option value="0" {{$user -> language=="0"? "selected": ""}}>Select One</option>
                            <option value="en" {{$user -> language=="en"? "selected": ""}}>Englist</option>  
                            <option value="kh" {{$user -> language=="kh"? "selected": ""}}>ភាសាខ្មែរ</option>  
                        </select>
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
        function clearVal(){
            document.getElementById('username').value = '';
            document.getElementById('password').value = '';
            document.getElementById('email').value = '';
            document.getElementById('language').selectedIndex = 0;          
        }
    </script>
@endsection