<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<a href="{{route('register.create')}}">register</a>
<form action="{{route('login')}}" method="post">
    @csrf
    <p>Login:<input type="email" name="email"></p><br>
    <p><input type="password" name="password"></p>
    <button type="submit">submit</button>
</form>
</body>
</html>
