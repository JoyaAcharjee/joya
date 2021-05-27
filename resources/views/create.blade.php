<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create employee</title>
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
                    Create Employee
                </div>
                <div class="card-body">
                    <form method="post" action="{{ URL::to('store-employee') }}" >
                        {{--                {{ csrf_field() }}--}}
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name"   class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="age"  class="form-control">
                        </div>
                        <div class="form-group">
{{--                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" >--}}
                            <label >
                                Gender
                            </label>
                            <br>
                            <input  type="radio" name="gender"  value="male" />Male
                            <input  type="radio" name="gender"  value="female" />Female
                            <input  type="radio" name="gender"  value="custom" />Custom
                        </div>
                        <div class="form-group">
                            <label>Is active</label>
                            <input type="checkbox" name="is_active" >
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" name="role"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password"  class="form-control">
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label>Salary</label>--}}
{{--                            <input type="text" name="salary" class="form-control">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label>Details</label>--}}
{{--                            <textarea name="details" rows="3" class="form-control"></textarea>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label></label>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="{{URL::to('employees')}}">All Employees</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>

</body>
</html>
