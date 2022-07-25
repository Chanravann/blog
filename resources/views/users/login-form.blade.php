@extends('layouts.master')
@section('title')
    <title>Log in</title>
@endsection
@section('style')
    <style>
        h3{
            margin: 20px 0px;
        }
        input[type='text']{
            margin-bottom: 15px;
        }
        input[type='password']{
            margin-bottom: 15px;
        }
    </style>
@endsection
@section('content')
    <h3 class='text-primary'>LOG IN</h3>
    <hr>
    @component('component.msgcomponent')
    @endcomponent
    <form action="{{url('login-form/do-login')}}" method="POST">
        @csrf 
        <div class="row">
            <div class="col-sm-5">
                <div class="from-group row">
                    <label for='user_name' class="col-sm-3">User name: </label>
                    <div class="col-sm-9">
                        <input type="text" name="username" id="user_name" class="form-control" required>
                    </div>
                </div>
                <div class="from-group row">
                    <label for='password' class="col-sm-3">Password: </label>
                    <div class="col-sm-9">
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                </div>
                <div class="from-group row">
                    <label for='' class="col-sm-3"></label>
                    <div class="col-sm-9">
                        <input type="submit" id="" class="btn btn-primary btn-sm">
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection