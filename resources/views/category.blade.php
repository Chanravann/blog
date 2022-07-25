@extends('layouts.master')
@section('title')  
    <title>Category Page</title>
@endsection
@section('content')
    <h1>Category Page</h1>
    <hr>
    @if($score>=90)
        <h1>Grade A</h1>
    @elseif($score>=80)
        <h1>Grade B</h1>
    @elseif($score>=70)
        <h1>Grade C</h1>
    @elseif($score>=60)
        <h1>Grade D</h1>
    @elseif($score>=50)
        <h1>Grade E</h1>
    @else
        <h1>Grade F</h1>
    @endif
    <h1>loop</h1>
    @for($i=1; $i<=5; $i++)
        hello {!!$i!!}<br>
    @endfor
    <h1>loop 2 </h1>
    @for($i=1; $i<=5; $i++)
        @for($j=4; $j>=$i; $j--)
            &nbsp;
        @endfor
        @for($k=1; $k<=$i; $k++)
            *
        @endfor
        <br>
    @endfor
    <h1>loop 1 to 10</h1>
    @for($l=1; $l<=10; $l++)
        loop {{$l}}<br>
    @endfor
    <h1>for each</h1>
    @php($arr=array(1,2,3,4,5,6))
    <ul>
        @foreach($arr as $a)
            <li>{{$a}}</li>
        @endforeach
    </ul>
@endsection