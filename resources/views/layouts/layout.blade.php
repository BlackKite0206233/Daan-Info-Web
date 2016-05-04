<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>大安高工資訊科專題網</title>
    <link rel="stylesheet" type="text/css" href="./semantic/semantic.min.css" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <script src="./js/jquery-2.1.4.min.js"></script>
    <script src="./semantic/semantic.min.js"></script>
    <script src="slidesjs/jquery.slides.min.js"></script>
</head>

<body>
    <div id="top" class="ui menu borderless column" style="background-color:#ff9800!important;">
        <div class="header item" style="text-align:center;">
            <a href="/"><h2 style="color:white;font-family:微軟正黑體;"><i class="lab icon"></i>大安高工資訊科專題網</h2></a>
        </div>
        <a href="/browse/page" class="ui item" style="color:white;">瀏覽專題</a>
        <a href="/browse/teacher" class="ui item" style="color:white;">開課資訊</a>
        <a href="/ref" class="ui item" style="color:white;">參考資料</a>
        <div class="right menu">
            <form class="item" method="post" action="/browse/search">
                <div class="ui icon input">
                    <input name="searchWord" type="text" placeholder="Search...">
                    <i class="search icon"></i>
                </div>
            </form>
            <a class="ui item" style="color:white;" href="/login"><i class="sign in icon"></i>登入</a>
        </div>
    </div>

    @yield('content')

    <div id="bot" class="ui fluid center aligned segment" style="background-color:#ff9800!important;margin-bottom:-10px;">
        <center>
            <h7 style="color:white;">校址：(10664)臺北市大安區復興南路2段52號．總機：(02)27091630 ． <br />
            No. 52, Sec. 2, Fusing S. Rd., Taipei City, Taiwan 10664, R.O.C. TEL: (02)27091630 FAX: (02) 27090635 <br />
            Copyright © 2010 by Taipei Municipal Da-An Vocational High School. All Rights Reserved.
            </h7>
        </center>
    </div>
    <script>
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
</body>

</html>