@extends('layouts.layout')
@section('content')
    <div class="container">
    @inject('topicPresenters','daan_info_web\Presenters\topicPresenters')
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 style="margin:5px;">專題簡介</h4></div>
            <table class="table rows table-hover hidden-xs" style="text-align:center;">
                <tr>
                    <td rowspan="8" width="50%"><img class="img-responsive" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data1.png"></td>
                    {!! $topicPresenters->outputTopic($topic,0) !!}
                </tr>
            </table>

            <table class="table table-hover visible-xs-block" style="text-align:center;">
                <tr>
                    <td colspan="2"><img class="img-responsive" src="http://info.taivs.tp.edu.tw/topic/upload/105/G105C04/G105C04_Data1.png"></td>
                </tr>
                <tr>
                    {!! $topicPresenters->outputTopic($topic,1) !!}
                </tr>
            </table>
        </div>
        {!! $topicPresenters->getContent($topic->topiccontent) !!}

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 style="margin:5px;">組員照片</h4></div>
            <div class="panel-body rows">
                {!! $topicPresenters->getPic($topic->groupno,'memberpic') !!}
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 style="margin:5px;">系統架構圖</h4></div>
            <div class="panel-body rows">
                {!! $topicPresenters->getPic($topic->groupno,'structurepic') !!}
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 style="margin:5px;">成品照片</h4></div>
            <div class="panel-body rows">
                {!! $topicPresenters->getPic($topic->groupno,'productpic') !!}
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 style="margin:5px;">成品影片</h4></div>
            <div class="panel-body rows">
                {!! $topicPresenters->getVideo($topic->video) !!}
            </div>
        </div>
    </div>

@endsection