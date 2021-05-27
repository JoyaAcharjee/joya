@extends('admin.layouts.single')
@section('emp')

<div class="container">
<h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a>Manage Sessions</a></li>
                    <li class="breadcrumb-item "><a href="{{URL::to('session')}}">View Sessions</a></li>
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
                    Edit section
                </div>
                <div class="card-body">
                    <form method="post" action="{{ URL::to('update-section/'.$sec->id) }}" >
                        
                        @csrf
                        <div class="form-group">
                            <label>Section Name</label>
                            <input type="text" name="name"  value="{{$sec->section}}"  class="form-control">
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
