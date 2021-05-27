<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <div class="col-md-8 offset-2 mt-3">
        <div class="card">
            <div class="card-header">
                Edit Employee
            </div>
            <div class="card-body">
                <form method="post" action="{{ URL::to('update-employee/'.$employee->id) }}" >
                    {{--                {{ csrf_field() }}--}}
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name"  value="{{$employee->name}}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{$employee->email}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="date" name="age"  value="{{$employee->age}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
{{--                        <input type="radio" name="gender" value="{{$employee->gender}}" class="form-control">--}}
                        <input  type="radio" name="gender"  value="Male" {{ $employee->gender == 'Male' ? 'checked' : ''}} />Male
                        <input  type="radio" name="gender"  value="Female" {{ $employee->gender == 'Female' ? 'checked' : ''}} />Female
                        <input  type="radio" name="gender"  value="Custom" {{ $employee->gender == 'Custom' ? 'checked' : ''}} />Custom
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label>Details</label>--}}
{{--                        <textarea name="details" rows="3" class="form-control">{{ $employee->details }}</textarea>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label>Is active</label>
                        <input type="checkbox" name="is_active" value="1" {{  ($employee->is_active == 1 ? ' checked' : '') }} >
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" name="role"  value="{{$employee->role}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label></label>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-secondary" href="{{URL::to('employees')}}">All Employees</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

</div>

</body>
</html>

