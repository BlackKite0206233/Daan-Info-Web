@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">

            <form class="form-signin col-md-4 thumbnail" role="form" style="float:none;margin:0 auto;padding:30px;" method="post" action="/login">
                <center>
                    <h2 class="form-signin-heading">登入</h2>
                    <label for="inputEmail" class="sr-only">帳號</label>
                    <input type="text" name="ID" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                    <label for="inputPassword" class="sr-only">密碼</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                    <button style="margin-top:10px;" class="btn btn-lg btn-primary btn-block" type="submit">登入</button>
                    {{ csrf_field() }}
                </center>
            </form>
        </div>
    </div>
@endsection