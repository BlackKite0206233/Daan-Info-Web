@extends('layouts.layout')
@section('content')
    <div class="container">
        <script>
            if({{session('logout')}})
            {
                $('.container').append('<div id="alert" class="alert alert-success" role="alert">登出成功</div>');
                setTimeout(function(){
                    $('#alert').remove();
                },2000);
            }
        </script>
        <div id="slides">
            <img src="{{asset('img/teacher.jpg')}}">
            <img src="{{asset('img/home.jpg')}}">
            <img src="{{asset('img/teacher.jpg')}}">
            <img src="{{asset('img/home.jpg')}}">
            <img src="{{asset('img/teacher.jpg')}}">
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4" style="padding:5px;">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4>Elliot Fu</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eaque sit nesciunt. Nulla accusantium voluptatem modi voluptatum repudiandae expedita id, perferendis hic, reprehenderit magnam. Laborum autem quidem, et voluptatem est!</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4" style="padding:5px;">
                   <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Elliot Fu</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eaque sit nesciunt. Nulla accusantium voluptatem modi voluptatum repudiandae expedita id, perferendis hic, reprehenderit magnam. Laborum autem quidem, et voluptatem est!</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-4" style="padding:5px;">
                   <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>Elliot Fu</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At eaque sit nesciunt. Nulla accusantium voluptatem modi voluptatum repudiandae expedita id, perferendis hic, reprehenderit magnam. Laborum autem quidem, et voluptatem est!</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>

        function logout()
        {

        }
        $(function () {
            $('#slides').slidesjs({
                width: 940,
                height: 528,
                play: {
                    auto: true,
                    interval: 2000,
                }
            });
        });
    </script>
@endsection