@extends('admin.layouts.single')
@section('emp')
<div class="container">
        <div class="col mt-3">
            <div class="card">
                <div class="card-header">
                    Create Session
                </div>
                <div class="card-body">
                    <form method="post" action="{{ URL::to('store-session') }}" >
                        
                        @csrf
                        <div class="form-group">
                            <label>Session Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"  class="form-control">
                            <span class="error">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="checkbox" name="status" >
                        </div> 
                        <div class="form-group">
                            <label></label>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- <a class="btn btn-secondary" href="{{URL::to('employees')}}">All Employees</a> -->
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
@stop
