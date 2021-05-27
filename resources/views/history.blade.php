<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
</head>
<body>
<h2>History page</h2>
<p> Description: {{$dec}}</p>
<p> Category: {{$c}}</p>
<p>Employees</p>
<ul>
    @foreach($emps as $e)
<li>{{$e}}</li>
    @endforeach
</ul>
</body>
</html>
