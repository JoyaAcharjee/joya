@extends('admin.layouts.single')
@section('emp')

<div class="container">
<h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Manage Subjects</a></li>
                    <li class="breadcrumb-item "><a href="{{URL::to('session')}}">View Subjects</a></li>
                </ol>
        <div class="col mt-3">
            <div class="card">
                <div class="card-header">
                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                    Edit Subject
                </div>
                <div class="card-body">
                    <form method="post" action="{{ URL::to('update-subject/'.$subjects->id) }}" >
                        
                        @csrf
                        <div class="form-group">
                            <label>Subject Name</label>
                            <input type="text" name="sub_name"  value="{{$subjects->sub_name}}"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Subject Code</label>
                            <input type="text" name="sub_code" value="{{$subjects->sub_code}}"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Subject Shortname</label>
                            <input type="text" name="sub_shortname" value="{{$subjects->sub_shortname}}"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Subject Type</label>
                            <select class="form-control" name="sub_type">
                               
                                    <option value="{{$subjects->sub_type}}" >{{$subjects->sub_type}}</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <button type="submit" class="btn btn-primary">Update</button>
                            
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>
@stop
