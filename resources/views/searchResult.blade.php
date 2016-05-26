@extends('layouts.layout')
@section('content')
<div class="container">
    @inject('browsePresenters','daan_info_web\Presenters\browsePresenters')

    {!! $browsePresenters->brief($topic) !!}

    {!! $topic->links() !!}
</div>

@endsection