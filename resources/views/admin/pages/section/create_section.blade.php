@extends('admin.layouts.single')
@section('emp')
<div class="container">
        <div class="col mt-3">
            <div class="card">
                <div class="card-header">
                    Create Section
                </div>
                <div class="card-body">
                    <form method="post" action="{{ URL::to('store-section') }}" >                       
                        @csrf
                        <div class="form-group">
                            <label>Section Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"  class="form-control">
                            <span class="error">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- <a class="btn btn-secondary" href="{{URL::to('section')}}">All Employees</a> -->
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
@stop
