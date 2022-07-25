@extends('layouts.master')
@section('title')
    <title>Regions</title>
@endsection
@section('style')   
    <style>
        h3{
            margin: 20px 0px;
        }
    </style>
@endsection
@section('content')
    <h3 class='text-primary'>Regions</h3>
    <hr>
    {{bcrypt('123')}}
    <ul>
        @foreach($regions as $re)
            <li>{{$re -> name}} <span class='text-danger'>({{$re->total}})នាក់</span></li>
        @endforeach
    </ul>
    <div>
        {{$regions->links()}}
    </div>
@endsection