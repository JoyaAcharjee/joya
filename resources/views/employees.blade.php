<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="container">
<h2>All Employees</h2>
<a class="btn btn-primary " style="margin-bottom: 10px" href="{{URL::to('create-employee')}}">Create Employee</a>
<table class="table table-striped table-bordered" style="text-align: center">
    <thead>
    <th>Name</th>
    <th>Email</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Is Active</th>
    <th>Role</th>
    <th>Action</th>
    </thead>
    <tbody>
        @foreach($employees as $e)
            <tr>
                <td>{{ $e->name }}</td>
                <td>{{ $e->email }}</td>
                <td>{{ $e->age }}</td>
                <td>{{ $e->gender }}</td>
                <td>{{ $e->is_active }}</td>
                <td>{{ $e->role }}</td>
                <td >
                    <a class="btn btn-success" href="{{ URL::to('edit-employee/'.$e->id)}}" >Edit</a>
                    <a class="btn btn-danger" href=""data-toggle="modal" data-target="#myModal{{ $e->id }}">Delete</a>
                    <div class="modal" id="myModal{{ $e->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Confirmation</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    Are you sure you want to delete <b>{{ $e->name }}</b>??
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <a class="btn btn-danger" href="{{ URL::to('delete-employee/'.$e->id) }}">Yes</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
