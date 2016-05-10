@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row text-center">
            <center>
                @for($i=0;$i<5;$i++)
                <div class="col-md-3" style="float:none;display:inline-block;">
                    <a href="#" style="text-decoration:none">
                        <img class="img-circle" src="{{asset('img/teacher.jpg')}}" alt="Generic placeholder image" style="width:280px;height:280px">
                        <h4 style="font-weight:bold;margin:15px;">楊敏男老師</h4>
                        <h5 style="margin-top:-15px;color:rgb(181, 181, 181);">視窗程式</h5>
                    </a>
                </div>
                @endfor
            </center>
        </div>
    </div>
@endsection