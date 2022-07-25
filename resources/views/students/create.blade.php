@extends('layouts.master')
@section('title')
    <title>Create Student</title>
@endsection
@section('style')
    <style>
        h3{
            margin: 30px 0;
        }
        .btn-back{
            margin-bottom: 15px;
        }
        #btn-save{
            margin-top: 30px;
        }
        input[type='text']{
            margin-bottom: 20px;
        }
        select{
            margin-bottom: 20px;
        }
        label{
            margin-bottom: 20px;
        }
    </style>
@endsection
@section('content')
    <h3>Create Student</h3>
    <hr>
    <div class="btn-back">
        <a href="{{route('student.index')}}" class='btn btn-danger'>
            <i class="fa-solid fa-angle-left"></i>&nbsp;&nbsp;Back
        </a>
    </div>
    @if(Session::has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{session('error')}}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{route('student.store')}}" method='POST' enctype='multipart/form-data'>
        @csrf 
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="name" class='col-sm-3'>Name&nbsp;<span class='text-danger'>&#42;</span></label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class='col-sm-3'>Gender</label>
                    <div class="col-sm-8">
                        <select name="gender" id="" class='form-control'>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class='col-sm-3'>Phone</label>
                    <div class="col-sm-8">
                        <input type="text" name="phone" id="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class='col-sm-3'>Gmail</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" id="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class='col-sm-3'>Address</label>
                    <div class="col-sm-8">
                        <select name="address" id="" class="form-select">
                            <option value="Banteay Meanchey">Banteay Meanchey</option>
                            <option value="Battambang">Battambang</option>
                            <option value="Kampong Cham">Kampong Cham</option>
                            <option value="Kampong Chhnang">Kampong Chhnang</option>
                            <option value="Kampong Speu">Kampong Speu</option>
                            <option value="Kampong Thom">Kampong Thom</option>
                            <option value="Kampot">Kampot</option>
                            <option value="Kandal">Kandal</option>
                            <option value="Koh Kong">Koh Kong</option>
                            <option value="Kratié">Kratié</option>
                            <option value="Mondulkiri">Mondulkiri</option>
                            <option value="Phnom Penh" selected>Phnom Penh</option>
                            <option value="Preah Vihear">Preah Vihear</option>
                            <option value="Prey Veng">Prey Veng</option>
                            <option value="Pursat">Pursat</option>
                            <option value="Ratanakiri">Ratanakiri</option>
                            <option value="Siem Reap">Siem Reap</option>
                            <option value="Preah Sihanouk">Preah Sihanouk</option>
                            <option value="Stung Treng">Stung Treng</option>
                            <option value="Svay Rieng">Svay Rieng</option>
                            <option value="Takéo">Takéo</option>
                            <option value="Oddar Meanchey">Oddar Meanchey</option>
                            <option value="Kep">Kep</option>
                            <option value="Pailin">Pailin</option>
                            <option value="Tboung Khmum">Tboung Khmum</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="score" class='col-sm-3'>Score</label>
                    <div class="col-sm-8">
                        <input type="text" name="score" id="" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class='col-sm-3'>Photo</label>
                    <div class="col-sm-8">
                        <input type="file" name="photo" id="" class="form-control" onchange='previewPhoto(event)'>
                        <div id="pic">
                            <img src="" alt="" id='img' width="150">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class='col-sm-3'></label>
                    <div class="col-sm-8">
                        <input type="submit" value=" Save " class='btn btn-primary' id='btn-save'>
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
