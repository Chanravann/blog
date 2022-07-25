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
    <h3 class="text-secondary">Category List</h3>
    <hr>
    <div class="row">
        <div class="col-sm-2">
            <a href="{{url('category/create')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;Create
            </a>
        </div>
        
        <!-- <div class="col-sm-4"></div>
        <div class="col-sm-4 form-group">
            <form action="" autocompleted='off'>            
                <input type="text" name="query_search" id="txt-search" placeholder='Input text to search' autocompleted='off'>
                <input type="submit" value="Search" class='btn btn-secondary'>
            </form>
        </div> -->
    </div>
    <p></p>
    @component('component.msgcomponent')
    @endcomponent
    <table class="table-sm table-bordered">
        <tr class='text-primary'>
            <th>N&#176;</th>
            <th>Category Name</th>
            <th>Create Data</th>
            <th>Actions</th>
        </tr>
        @php   
            $page = @$_GET['page'];
            if(!$page){
                $page = 1;
            }
            $i = config('app.row') * ($page-1) + 1;
        @endphp
        @foreach($category as $cat)   
        <tr>
            <td>{{$i++}}</td>
            <td>{{$cat -> name}}</td>
            <td>{{$cat -> create_at}}</td>
            <td>
                <a href="{{route('category.edit', $cat->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{route('category.delete',$cat->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record')">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
    <div class = "pagination">
       {{$category->links()}}
    </div> 
@endsection