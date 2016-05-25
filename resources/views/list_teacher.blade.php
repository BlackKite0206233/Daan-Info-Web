@extends('layouts.layout')
@section('content')
    <div class="container">
    @inject('browsePresenters','daan_info_web\Presenters\browsePresenters')
            <div class="row">
                {!! $browsePresenters->brief($acc) !!}

            </div>

    </div>

@endsection