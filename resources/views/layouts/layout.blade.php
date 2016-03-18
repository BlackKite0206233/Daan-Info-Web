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
            @if(!Auth::check())
                @include('ctrlbar.guest')
            @elseif(Auth::user()->category == "s")
                @include('ctrlbar.student')
            @elseif(Auth::user()->acc == "admin")
                @include('ctrlbar.admin')
            @else
                @include('ctrlbar.teacher')
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