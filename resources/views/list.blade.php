@extends('layouts.layout')
@section('content')
    <div class="container">
    @inject('browsePresenters','daan_info_web\Presenters\browsePresenters')
        <div role="tabpanel">

            <ul class="nav nav-tabs" role="tablist" id="myTab">
                <li role="presentation" class="active"><a href="#pAll" aria-controls="pAll" role="tab" data-toggle="tab">所有專題</a></li>
                <li role="presentation"><a href="#p105" aria-controls="p105" role="tab" data-toggle="tab">105</a></li>
                <li role="presentation"><a href="#p104" aria-controls="p104" role="tab" data-toggle="tab">104</a></li>
                <li role="presentation"><a href="#p103" aria-controls="p103" role="tab" data-toggle="tab">103</a></li>
                <li role="presentation"><a href="#p102" aria-controls="p102" role="tab" data-toggle="tab">102</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="pAll">
                    {!!$browsePresenters->brief($topic)!!}
                </div>
                <div role="tabpanel" class="tab-pane" id="p105">

                </div>
                <div role="tabpanel" class="tab-pane" id="p104">

                </div>
                <div role="tabpanel" class="tab-pane" id="p103">

                </div>
                <div role="tabpanel" class="tab-pane" id="p102">

                </div>
                {!! $topic->links() !!}
            </div>

            <script>
                $('#myTab a').click(function (e) {
                    //$(".active.tab-pane").empty();
                    e.preventDefault();
                    $(this).tab('show');
                    var url = "";

                    switch (this.href.substr(-5))
                    {
                        case "#pAll":
                            url = "year";
                            break;
                        case "#p105":
                            url = "year/105";
                            break;
                        case "#p104":
                            url = "year/104";
                            break;
                        case "#p103":
                            url = "year/103";
                            break;
                        case "#p102":
                            url = "year/102";
                            break;
                        default :
                            url = "year";
                            break;
                    }

                    $.ajax({
                        type:'get',
                        url:url,
                        success:function(){
                            $(".active.tab-pane").html('{!!$browsePresenters->brief($topic)!!}');
                        }
                    });
                })
            </script>
        </div>
    </div>

@endsection