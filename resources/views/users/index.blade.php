@extends('layouts.master')
@section('title')
    <title>User list</title>
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
    <h3 class='text-primary'>User list</h3>
    <hr>
    @component('component.msgcomponent')
    @endcomponent
    
    <div class="btn-create row">
        <div class="col-1">
            <div class="form-group row">
            <a href="{{route('user.create')}}" class='btn btn-primary'>
                <i class='fas fa-plus'></i>&nbsp;New
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
            <th>Username</th>
            <th>Password</th>
            <th>Language</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
        </tr>
        @php($i=1)
        @foreach($users as $user)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$user -> username}}</td>
            <td>{{substr($user -> password, 0 , 15) . '....'}}</td>
            <td>{{$user -> language}}</td>
            <td>{{$user -> email}}</td>
            <td>{{$user -> created_at}}</td>
            <td>{{$user -> updated_at}}</td>
            <td>
                <a href="{{route('user.edit', $user -> id)}}" class='btn btn-sm btn-primary'>Edit</a>
                <a href="{{route('user.delete', $user -> id)}}" class='btn btn-sm btn-danger' onclick="return confirm('Are you sure? You want to delete??')">Delete</a>
            </td>
        </tr>
        @endforeach
        
    </table>
    <p>
        {{$users -> links()}}
    </p>
@endsection