 @extends('layouts.layout')
 @section('content')
     <form method="post" action="/login">
        <p>
            帳號：
            <input type="text" name="acc">
        </p>
        <p>
            密碼：
            <input type="password" name="password">
        </p>
        <p>
            <input type="submit" value="登入">
        </p>
     </form>
 @endsection