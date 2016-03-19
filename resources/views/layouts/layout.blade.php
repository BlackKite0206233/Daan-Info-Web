<html>
<head>
    <title>大安高工資訊科專題製作網</title>
</head>
<body>
    <div class="head">
        <img src="">
    </div>
    <div class="body">
        <div class="ctrlbar">
            <a href="/browse/page"><button>瀏覽專題</button></a>
            <a href="/browse/search"><button>搜尋專題</button></a>
            @if(!Auth::check())
                @include('ctrlbar.guest')
            @else
                @if(Auth::user()->category == "s")
                    @include('ctrlbar.student')
                @else
                    @if(Auth::user()->acc == "admin")
                        @include('ctrlbar.admin')
                    @endif
                    @include('ctrlbar.teacher')
                @endif
                <a href="/member/pwd/edit"><button>修改密碼</button></a>
                <a href="/logout"><button>系統登出</button></a>
            @endif
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
    <div class="foot">
    </div>
</body>
</html>