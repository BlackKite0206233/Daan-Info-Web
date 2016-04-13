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
            {{session('status')}}
            <a href="/browse/page"><button>瀏覽專題</button></a>
            <a href="/browse/search"><button>搜尋專題</button></a>
            @if(session('status') == NULL || session('status') == "guest")
                @include('ctrlbar.guest')
            @else
                @if(session('status') == "student")
                    @include('ctrlbar.student')
                @else
                    <a href="/topic/edit"><button>修改專題</button></a>
                    <a href="/gradeinfo"><button>開課資訊</button></a>
                    @if(session('status') == "admin")
                        @include('ctrlbar.admin')
                    @endif
                    <a href="/score"><button>成績登入</button></a>
                    <a href="/download"><button>表格下載</button></a>
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