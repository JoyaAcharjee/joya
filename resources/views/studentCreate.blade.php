<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="col-md-8 offset-3 ">

        <form method="post" action="{{ URL::to('store-stude') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Name</label>
                <input type="text"  value="{{ old('name') }}" name="name" class="form-control">
                <span class="error">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                <span class="error">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" value="{{ old('age') }}" name="age" class="form-control">
                <span class="error">{{ $errors->first('age') }}</span>
            </div>
            <div class="form-group">
                <label>Salary</label>
                <input type="number" value="{{ old('salary') }}" name="salary" class="form-control">
                <span class="error">{{ $errors->first('salary') }}</span>
            </div>
            <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" value="{{ old('dob') }}" name="dob" class="form-control">
                <span class="error">{{ $errors->first('dob') }}</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>


    </div>

</div>

</body>
</html>
