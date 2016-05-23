@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">

            <form class="form-signin col-md-4 thumbnail" role="form" style="float:none;margin:0 auto;padding:30px;" method="post" action="member/{{session('memID')}}">
                <center>
                    <h2 class="form-signin-heading">修改密碼</h2>
                    <br>
                    <label for="inputEmail" class="sr-only">舊密碼</label>
                    <input type="text" name="oldPwd" id="inputEmail" class="form-control" placeholder="請輸入舊密碼" required="" autofocus="">
                    <br>
                    <label for="inputPassword" class="sr-only">新密碼</label>
                    <input type="password" name="newPwd" id="inputPassword" class="form-control" placeholder="請輸入新密碼" required="">
                    <br>
                    <label for="inputPassword" class="sr-only">重新輸入新密碼</label>
                    <input type="password" name="retypePwd" id="inputPassword" class="form-control" placeholder="請重新輸入新密碼" required="">
                    <button style="margin-top:10px;" class="btn btn-lg btn-primary btn-block" type="submit">修改</button>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                </center>
            </form>
        </div>
    </div>

@endsection