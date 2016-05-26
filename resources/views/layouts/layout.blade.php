<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>大安高工資訊科專題網</title>

    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- HTML5 shim and Respond.js 讓 IE8 支援 HTML5 元素與媒體查詢 -->
    <!-- 警告：Respond.js 無法在 file:// 協定下運作 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (Bootstrap 所有外掛均需要使用) -->
    <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
    <!-- 依需要參考已編譯外掛版本（如下），或各自獨立的外掛版本 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('slidesjs/jquery.slides.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('lightbox/lightbox.css')}}" type="text/css" />
    <script type="text/javascript" src="{{asset('lightbox/lightbox.js')}}"></script>
    <script src="{{asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <link href="{{asset('kartik-v-bootstrap-fileinput/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css" />
    <script src="{{asset('kartik-v-bootstrap-fileinput/js/fileinput.js')}}" type="text/javascript"></script>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#ff9800!important;" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a class="navbar-brand" href="/" style="margin-top:0px;"><img src="{{asset('img/ic.png')}}"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                @inject('ctrlbarPresenter','daan_info_web\Presenters\ctrlbarPresenter')
                <ul class="nav navbar-nav">
                    <li><a href="/browse/page" style="color:white;">瀏覽專題</a></li>
                    <li><a href="/browse/teacher" style="color:white;">開課資訊</a></li>
                    {!! $ctrlbarPresenter->ctrlbar(session('status'),session('memID')) !!}
                    <li><a href="/ref" style="color:white;">參考資料</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right" style="margin-right:5px;">
                    <li>
                        <form class="navbar-form form-inline" role="search" method="post" action="/browse/search">
                            <div class="form-group">
                                <div class="input-group">
                                    <label class="sr-only" for="search">Search</label>
                                    <input type="text" class="form-control" id="search" placeholder="Search" name="Search">
                                    <div class="input-group-addon"><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></div>
                                    {{ csrf_field() }}
                                </div>
                            </div>
                        </form>
                    </li>
                    <li>
                        {!! $ctrlbarPresenter->loginOrLogout(session('status')) !!}
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <nav class="navbar navbar-default navbar-fixed-bottom" style="background-color:#ff9800!important;" role="navigation">
        <center>
            <h7 style="color:white;">校址：(10664)臺北市大安區復興南路2段52號．總機：(02)27091630 ．
                <br /> No. 52, Sec. 2, Fusing S. Rd., Taipei City, Taiwan 10664, R.O.C. TEL: (02)27091630 FAX: (02) 27090635
                <br /> Copyright © 2010 by Taipei Municipal Da-An Vocational High School. All Rights Reserved.
            </h7>
        </center>
    </nav>


</body>

</html>