@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">

            <form class="form-signin col-md-4 thumbnail" role="form" style="float:none;margin:0 auto;padding:30px;" method="post" action="login">
                <center>
                    <h2 class="form-signin-heading">登入</h2>
                    <label for="inputID" class="sr-only">帳號</label>
                    <input type="text" id="inputID" name="ID" class="form-control" placeholder="ID" required="" autofocus="">
                    <label for="inputPassword" class="sr-only">密碼</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
                    <button style="margin-top:10px;" class="btn btn-lg btn-primary btn-block" type="submit">登入</button>
                </center>
            </form>
        </div>
    </div>
@endsection