@extends('admin.layouts.single')
@section('emp')
<div class="container">
        <div class="col mt-3">
            <div class="card">
                <div class="card-header">
                    Create Student
                </div>
                <div class="card-body">
                    <form method="post" action="{{ URL::to('store-student') }}" >
                        {{--                {{ csrf_field() }}--}}
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"  class="form-control">
                            <span class="error">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                            <span class="error">{{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Student ID</label>
                            <input type="text" name="student_id" value="{{ old('student_id') }}" class="form-control">
                            <span class="error">{{ $errors->first('student_id') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" name="role" value="{{ old('role') }}"  class="form-control">
                            <span class="error">{{ $errors->first('role') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label></label>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            {{-- <a class="btn btn-secondary" href="{{URL::to('employees')}}">All Employees</a> --}}
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
@stop
