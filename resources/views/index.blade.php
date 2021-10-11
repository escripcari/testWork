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
<div>
    <h2>Hello user: {{$user->name}}</h2>
    @guest()
        <a href="{{route('register.create')}}">register</a>
        |
        <a href="{{route('login.form')}}">login</a>
    @endguest
    @auth()
        <a href="{{route('logout')}}">logout</a>
    @endauth
</div>
<div>сортировать по:
    <ul>
        <form action="{{route('getOrderBy')}}" method="post" >
            @csrf
            <p>Asc <input type="radio" name="order[]" value="asc"> Desc <input type="radio" name="order[]" value="desc"></p>
            <li>Доходом <input type="radio" name="column[]" value="income"></li>
            <li>Расходом <input type="radio" name="column[]" value="expenses"></li>
            <li>Сумме <input type="radio" name="column[]" value="sum"></li>
            <li>Дата добавления <input type="radio" name="column[]" value="created_at"></li>
            <button type="submit">sort</button>
        </form>
    </ul>
</div>
<a href="{{route('accounts.create')}}">create</a>
@foreach($account as $oper)
    <p>|Название: <a href="{{route('accounts.show', ['account_id' => $oper->id])}}">{{$oper->title}}</a>|Доход: {{$oper->income}}|Расход: {{$oper->expenses}}|Сумма: {{$oper->sum}}|</p>
@endforeach

<p>Общий доход: {{$user->getFullIncomes()}}| Общий разход: {{$user->getFullExpenses()}}| Общая сумма: {{$user->getFullSum()}}</p>
</body>
</html>
