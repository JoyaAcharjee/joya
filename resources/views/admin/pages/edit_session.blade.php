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
                    Edit Session
                </div>
                <div class="card-body">
                    <form method="post" action="{{ URL::to('update-session/'.$sess->id) }}" >
                        
                        @csrf
                        <div class="form-group">
                            <label>Session Name</label>
                            <input type="text" name="name"  value="{{$sess->session}}"  class="form-control">
                        </div>
                        <div class="form-group">
                        <label>Status</label>
                        <input type="checkbox" name="status" value="1" {{  ($sess->status == 1 ? ' checked' : '') }} >
                    </div>
                        
                        <!-- <div class="form-group">
                                    <div class="form-check">
                                        @if($sess->status == 1)
                                            <input class="form-check-input" checked type="checkbox" id="gridCheck" 
                                            name="status" value="{{ $sess->status }}" value="1">
                                        @else
                                        <input class="form-check-input" type="checkbox" id="gridCheck" 
                                        name="status" value="{{ $sess->status }}" value="0">
                                        @endif
                                        <label class="form-check-label" for="gridCheck">
                                            Status
                                        </label>
                                    </div>
                        </div> -->
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
