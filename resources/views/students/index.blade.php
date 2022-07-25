@extends('layouts.master')
@section('title')
    <title>Student list</title>
@endsection
@section('style')
    <style>
        h3{
            margin: 30px 0;
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
        table tr th{
            height: 50px;
            border-bottom: 1px solid #1667f2;
        }
        table tr th:nth-child(1){
            text-align: center;
        }
        table tr th:nth-child(3){
            text-align: center;
        }
        table tr th:nth-child(8){
            text-align: center;
        }
        table tr th:nth-child(9){
            text-align: center;
        }
        table tr td:nth-child(1){
            text-align: center;
        }
        table tr td:nth-child(3){
            text-align: center;
        }
        table tr td:nth-child(8){
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <h3 class='text-primary'>Student List</h3>
    <hr>
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::has('succes'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('succes')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::has('del_true'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('del_true')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(Session::has('del_false'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('del_false')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="btn-create row">
        <div class="col-1">
            <div class="form-group row">
            <a href="{{route('student.create')}}" class='btn btn-primary'>
                <i class='fas fa-plus'></i>&nbsp;Create
            </a>
            </div>
        </div>
        <div class="col-6"></div>
        <div class="col-5">
           <form action="{{url('student/search')}}">
                <div class="form-group row">
                    <div class="col-10">
                        <input type="text" name="search" id="" value="{{$query}}" class='form-control' placeholder='Input anything you want to search'>
                    </div>
                    <div class="col-2 form-group row btn-search">
                        <input type="submit" value="Search" class='btn btn-secondary'>
                    </div>
                </div>
           </form>
        </div>
    </div>
    
    <table class="table table-dark">
        <tr class='text-primary'>
            <th>N&#176;</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Gmail</th>
            <th>Address</th>
            <th>Photo</th>
            <th>Score</th>
            <th>Action</th>
        </tr>
        @php 
            $page = @$_GET['page'];
            if(!$page){
                $page = 1;
            }
            $i = config('app.stu_row') * ($page-1) + 1;

            
        @endphp
        @foreach($students as $stu)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$stu -> name}}</td>
            <td>{{$stu -> gender}}</td>
            <td>{{$stu -> phone}}</td>
            <td>{{$stu -> email}}</td>
            <td>{{$stu -> address}}</td>
            <td> 
                <img src="{{asset($stu -> photo)}}" alt="" width='50'>
            </td>
            <td>{{$stu -> score}}</td>
            <td>
                <a href="{{route('student.edit', $stu -> id)}}" class='btn btn-sm btn-primary'>Edit</a>
                <a href="{{url('student/delete/' . $stu -> id)}}" class='btn btn-sm btn-danger' onclick="return confirm('Are you sure u want to delete\nThis record')">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="pagination">
        {{$students -> appends(request() -> query()) -> links()}}
    </div>
    <div>
        min score: {{$min_score}}
    </div>
@endsection