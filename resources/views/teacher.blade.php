@extends('layouts.layout')
@section('content')
    <div class="container">
    @inject('teacherPresenters','daan_info_web\Presenters\teacherPresenters')
        <div class="row text-center">
            <center>
                {!! $teacherPresenters->getTeacher() !!}

            </center>
        </div>
    </div>
@endsection