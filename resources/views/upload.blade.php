@extends('layouts.master')
@section('title')  
    <title>Upload file</title>
@endsection
@section('content')
    <h3>Upload File</h3>
    <hr>
    <form action="{{url('uploadfile/save')}}" method="POST" enctype="multipart/form-data">
        @csrf 
        <p>
            <input type="file" name="photo[]" accept='image/*' onchange='previewPhoto(event)' multiple id='photo'>
        </p>
        <div id="pic">

        </div>
        <p>
            <input type="submit" value="Upload">
        </p>
        <p>
            <!-- {{session('error')}} -->
            @component('component.msgcomponent')
            @endcomponent
        </p>
    </form>
@endsection
@section('javascript')
    <script>
        // preview 1 picture
        // function previewPhoto(evt){
        //     let img=document.getElementById('img');
        //     img.src=URL.createObjectURL(evt.target.files[0]);
        // }
        // preview multiple pictures
        function previewPhoto(evt){
            let photo=evt.target.files;
            let img="";
            for(let i=0; i<photo.length; i++){
                let src = URL.createObjectURL(evt.target.files[i]);
                img+="<img src='"+src+"' width='150' class='photo'>";
            }
            document.getElementById('pic').innerHTML=img;
            // let img=document.getElementById('img');
            // img.src=URL.createObjectURL(evt.target.files[0]);
        }
    </script>
@endsection