@extends('layouts.master')
@section('title')
    <title>Edite Student</title>
@endsection
@section('style')
    <style>
         h3{
            margin: 30px 0;
        }
        .btn-back{
            margin-bottom: 15px;
        }
        #btn-update{
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
    <h3>Edit Student</h3>
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
    <form action="{{route('student.update', $student -> id)}}" method="POST" enctype='multipart/form-data'>
        @csrf 
        @method('PATCH')
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label for="name" class='col-sm-3'>Name&nbsp;<span class='text-danger'>&#42;</span></label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="" class="form-control" value="{{$student -> name}}"> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class='col-sm-3'>Gender</label>
                    <div class="col-sm-8">
                        <select name="gender" id="" class='form-control'>
                            <option value="M" {{($student -> gender)=="M"?"selected":""}}>Male</option>
                            <option value="F" {{($student -> gender)=="F"?"selected":""}}>Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class='col-sm-3'>Phone</label>
                    <div class="col-sm-8">
                        <input type="text" name="phone" id="" class="form-control" value="{{$student -> phone}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class='col-sm-3'>Gmail</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" id="" class="form-control" value="{{$student -> email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class='col-sm-3'>Address</label>
                    <div class="col-sm-8">
                        <select name="address" id="" class="form-select">
                            <option value="Banteay Meanchey" {{($student -> address)=="Banteay Meanchey"?"selected":""}}>Banteay Meanchey</option>
                            <option value="Battambang" {{($student -> address)=="Battambang"?"selected":""}}>Battambang</option>
                            <option value="Kampong Cham" {{($student -> address)=="Kampong Cham"?"selected":""}}>Kampong Cham</option>
                            <option value="Kampong Chhnang" {{($student -> address)=="Kampong Chhnang"?"selected":""}}>Kampong Chhnang</option>
                            <option value="Kampong Speu" {{($student -> address)=="Kampong Speu"?"selected":""}}>Kampong Speu</option>
                            <option value="Kampong Thom" {{($student -> address)=="Kampong Thom"?"selected":""}}>Kampong Thom</option>
                            <option value="Kampot" {{($student -> address)=="Kampot"?"selected":""}}>Kampot</option>
                            <option value="Kandal" {{($student -> address)=="Kandal"?"selected":""}}>Kandal</option>
                            <option value="Koh Kong" {{($student -> address)=="Koh Kong"?"selected":""}}>Koh Kong</option>
                            <option value="Kratié" {{($student -> address)=="Kratié"?"selected":""}}>Kratié</option>
                            <option value="Mondulkiri" {{($student -> address)=="Mondulkiri"?"selected":""}}>Mondulkiri</option>
                            <option value="Phnom Penh" {{($student -> address)=="Phnom Penh"?"selected":""}}>Phnom Penh</option>
                            <option value="Preah Vihear" {{($student -> address)=="Preah Vihear"?"selected":""}}>Preah Vihear</option>
                            <option value="Prey Veng" {{($student -> address)=="Prey Veng"?"selected":""}}>Prey Veng</option>
                            <option value="Pursat" {{($student -> address)=="Pursat"?"selected":""}}>Pursat</option>
                            <option value="Ratanakiri" {{($student -> address)=="Ratanakiri"?"selected":""}}>Ratanakiri</option>
                            <option value="Siem Reap" {{($student -> address)=="Siem Reap"?"selected":""}}>Siem Reap</option>
                            <option value="Preah Sihanouk" {{($student -> address)=="Preah Sihanouk"?"selected":""}}>Preah Sihanouk</option>
                            <option value="Stung Treng" {{($student -> address)=="Stung Treng"?"selected":""}}>Stung Treng</option>
                            <option value="Svay Rieng" {{($student -> address)=="Svay Rieng"?"selected":""}}>Svay Rieng</option>
                            <option value="Takéo" {{($student -> address)=="Takéo"?"selected":""}}>Takéo</option>
                            <option value="Oddar Meanchey" {{($student -> address)=="Oddar Meanchey"?"selected":""}}>Oddar Meanchey</option>
                            <option value="Kep" {{($student -> address)=="Kep"?"selected":""}}>Kep</option>
                            <option value="Pailin" {{($student -> address)=="Pailin"?"selected":""}}>Pailin</option>
                            <option value="Tboung Khmum" {{($student -> address)=="Tboung Khmum"?"selected":""}}>Tboung Khmum</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="score" class='col-sm-3'>Score</label>
                    <div class="col-sm-8">
                        <input type="text" name="score" id="" class="form-control" value="{{$student -> score}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class='col-sm-3'>Photo</label>
                    <div class="col-sm-8">
                        <input type="file" name="photo" id="" class="form-control" onchange='previewPhoto(event)'>
                        <div id="pic">
                            <img src="{{asset($student -> photo)}}" alt="" id='img' width="150">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class='col-sm-3'></label>
                    <div class="col-sm-8">
                        <input type="submit" value=" Update " class='btn btn-primary' id="btn-update">
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
            // document.getElementById('img').innerHTML=img;
        </script>
    @endsection
@endsection