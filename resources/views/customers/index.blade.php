@extends('layouts.master')
@section('title')
    <title>Customers List</title>
@endsection
@section('style')
    <style>
        table{
            margin-bottom:20px;
        }
        .pagination{
            margin:auto;
        }
        h3{
            margin-bottom:20px;
            margin-top:20px;
        }
        .btn-create{
            margin-bottom:20px;      
        }
        table tr:nth-child(1){
            height: 50px;
        }
        table tr th:nth-child(1){
            width: 40px;
            text-align: center;
        }
        table tr th:nth-child(2){
            width: 150px;
        }
        table tr th:nth-child(3){
            width: 60px;
            text-align: center;
        }
        table tr th:nth-child(4){
            width: 100px;
            text-align: center;
        }
        table tr th:nth-child(5){
            width: 150px;
        }
        table tr th:nth-child(6){
            width: 150px;
            text-align: center;
        }
        table tr th:nth-child(7){
            width: 40px;
            text-align: center;
        }
        table tr th:nth-child(8){
            text-align: center;
        }
        table tr td:nth-child(7){
            text-align: center;
            cursor: pointer;
        }
        table tr td:nth-child(1){
            text-align: center;
        }
        #txt-search{
            padding: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-left:30px;
            margin-right:40px;
        }
    </style>
@endsection
@section('content')
    <h3 class="text-secondary">Customers List</h3>
    <hr>
    <div class="row">
        <div class="col-sm-2">
            <a href="{{url('customer/create')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;Create
            </a>
        </div>
        
        <div class="col-sm-4"></div>
        <div class="col-sm-4 form-group">
            <form action="{{url('customer/search')}}" autocompleted='off'>            
                <input type="text" name="query_search" id="txt-search" placeholder='Input text to search' value="{{$query}}" autocompleted='off'>
                <input type="submit" value="Search" class='btn btn-secondary'>
            </form>
        </div>
    </div>
    <p></p>
    @component('component.msgcomponent')
    @endcomponent
    {{bcrypt('123')}}
    <table class="table-sm table-bordered">
        <tr class='text-primary'>
            <th>N&#176;</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Gmail</th>
            <th>Address</th>
            <th>Regions</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        @php   
            $page = @$_GET['page'];
            if(!$page){
                $page = 1;
            }
            $i = config('app.row') * ($page-1) + 1;
        @endphp
        @foreach($customers as $customer)   
        <tr>
            <td>{{$i++}}</td>
            <td>{{$customer -> name}}</td>
            <td>{{($customer -> gender)=="F"?"Female":"Male"}}</td>
            <td>{{$customer -> phone}}</td>
            <td>{{$customer -> email}}</td>
            <td>{{$customer -> address}}</td>
            <td>{{$customer -> gname}}</td>
            <td>
                <img src="{{asset($customer -> photo)}}" alt="" width="40">
            </td>
            <td>
                <a href="{{url('customer/edit/'.$customer->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{route('customer.delete',$customer->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record')">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    <div class = "pagination">
        {{$customers -> appends(request()->query())->links()}}
    </div> 
@endsection