@extends('layouts.master')
@section('title')  
    <title>Register Page</title>
@endsection
@section('content')
    <h1>User Register</h1>
    <hr>
    {{--
        action can link url or name of route follow this:
        1.action="{{url('route_url')}}"
        2.action="{{route('route_name')}}" 
    --}}
    <form action="{{route('register.save')}}" method="POST">
        {{--
            @csrf(cross-site request forgery) or csrf_field() use to generate input type hidden to handle attack form request
            all method in laravel(DELETE, POST, PUECH, ) always us csrf 
        --}}
        @csrf<!-- generate token form-->
        <table>
            <tr>
                <td>
                    <!-- {{csrf_field()}} -->
                </td>
            </tr>
            <tr>
                <td>User_name: </td>
                <td>
                    <input type="text" name="txt_name" id="">
                </td>
            </tr>
            <tr>
                <td><br></td>
                <td><br></td>
            </tr>
            <tr>
                <td>User_phone: </td>
                <td>
                    <input type="text" name="txt_phone" id="">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit" name="btn_submit">
                </td>
            </tr>
        </table>
    </form>
@endsection