@extends('student.layouts.single')
@section('emp')
<main>
    <div class="container-fluid">
        <div class="card mb-4 mt-3">
            <div class="card-header">
                @if(Session::has('msg'))
                    <div class="alert alert-primary">
                        <strong>{{Session::get('msg')}}</strong>
                    </div>
                @endif
                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
                @endif
                <i class="fas fa-table mr-1 "></i>
                Request For Course
            </div>
            <div class="card-body">
            <form method="post" action="{{URL::to('store-enroll')}}" >
                {{csrf_field()}}
                    <div class="table-responsive">
                        <div class="form-group">

                            <label for="">Sessions</label>
                                <select class="form-control" id="dropdown" name="session" >

                                    <option class="dropdown-item" > select session</option>
                                        @foreach($sessions as $ea)
                                            @if(($ea->status)=="1")

                                                <option value="{{$ea->session}}">{{$ea->session}}</option>

                                                 @else

                                                <option  disabled value="{{$ea->session}}">{{$ea->session}}</option>

                                            @endif
                                        @endforeach
                                    </select>


                                    </div>
                                    <div id="tabledata">
                                        <table class="table table-bordered table-hover" id="dataTable" width="90%" cellspacing="0">
                                            <thead>

                                                <th>Subject Name</th>
                                                <th>Subject code</th>
                                                <th>Short Name</th>
                                                <th>Subject Type</th>
                                                {{-- <th>Section</th> --}}
                                                <th>Course Type</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                            @foreach($subjects as $e)
                                            <tr>

                                                <td>{{$e->sub_name}} </td>
                                                <td>{{$e->sub_code}}</td>
                                                <td>{{$e->sub_shortname}}</td>
                                                <td>{{$e->sub_type}}</td>
                                                {{-- <td> --}}
                                                    {{-- <select name="section_name" id="" class="form-control"> --}}
                                                        {{-- <option class="dropdown-item" value=""> select </option> --}}
                                                        {{-- @foreach ($sections as $s)
                                                            <option value="{{ $s->section }}">{{ $s->section }}</option>
                                                        @endforeach

                                                    </select> --}}
                                                {{-- </td> --}}
                                                <td>
                                                    <select name="course_name[]" id="" class="form-control">
                                                        {{-- <option class="dropdown-item" value="" > select </option> --}}
                                                        @foreach ($types as $t)
                                                            <option value="{{ $t->t_name }}">{{ $t->t_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gridCheck" name="checkbox[]" value="{{$e->id}}">
                                                    </div>
                                    </div>
                                                </td>

    </div>
                            </tr>

                                        @endforeach

                                        </tbody>

                                    </table>
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <label for=""></label>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a  class="btn btn-primary m-b-10" href="enroll">All request</a>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </main>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

                <script>
                    $(document).ready(function(){
                        $("#tabledata").hide();
                        $("#dropdown").change(function(){
                            console.log("hi...");
                            $("#tabledata").show();
                        })
                    })
                </script>

@stop


