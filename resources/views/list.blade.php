@extends('layouts.layout')
@section('content')
    <div class="container">
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
                    <div class="row">
                        @for($i=0;$i<8;$i++)
                        <div class="col-sm-6 col-md-3">
                            <a href="post.htm" class="thumbnail">
                                <img data-src="{{asset('holder.js/300x300')}}" src="{{asset('img/daan.png')}}" alt="..." style="background-color:rgba(0,0,0,.05);">
                                <div class="caption">
                                    <h4 style="font-weight:bold;margin-top:5px;margin-bottom:5px;">木棉手札</h4>
                                    <h5 style="color:rgba(0,0,0,.4);margin-top:5px;margin-bottom:5px;">105年</h5>
                                    <p style="color:rgba(0,0,0,.68);">近年來，因智慧型手機的崛起，人們越來越少使用電腦，大部分網頁都會製作適合手機觀看的網站或開發成手機應用程式。我們為了要解決系統查詢之不便與達成智慧校園的理想，而開發了這款APP。</p>
                                    <hr style="margin-top:15px;margin-bottom:15px;">
                                    <center>
                                        <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button_count&mobile_iframe=true&width=103&height=20&appId" width="103" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                                    </center>
                                </div>
                            </a>
                        </div>
                        @endfor
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="p105">...</div>
                <div role="tabpanel" class="tab-pane" id="p104">...</div>
                <div role="tabpanel" class="tab-pane" id="p103">...</div>
                <div role="tabpanel" class="tab-pane" id="p102">...</div>
            </div>

            <script>
                $('#myTab a').click(function (e) {
                    e.preventDefault()
                    $(this).tab('show')
                })
            </script>
        </div>
    </div>

@endsection