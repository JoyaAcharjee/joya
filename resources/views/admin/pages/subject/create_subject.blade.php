@extends('admin.layouts.single')
@section('emp')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="card">
            @if(Session::has('msg'))
                            <div class="alert alert-primary">
                                <strong>{{Session::get('msg')}}</strong>
                            </div>
                        @endif
<div class="card-header">
    Create Subject
</div>

<div class="card-body">
<form method="post" action="{{URL::to('store-subject')}}" >
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Subject Name</label>
        <input type="text" class="form-control" name="sub_name" id="">
        <span class="error">{{ $errors->first('sub_name') }}</span>
    </div>
    <div class="form-group">
        <label for="">Subject Code</label>
        <input type="text" class="form-control" name="sub_code" id="">
        <span class="error">{{ $errors->first('sub_code') }}</span>
    </div>
    <div class="form-group">
        <label for="">Subject Shortname</label>
        <input type="text" class="form-control" name="sub_shortname" id="">
        <span class="error">{{ $errors->first('sub_shortname') }}</span>
    </div>
    <div class="form-group">
    <label for="">Subject Type</label>
                    <select class="form-control" name="sub_type">
                        <option value="">Select Option</option>
                        {{-- @foreach ($subjects as $item)
                            <option value=" {{$item->id}} "> {{$item->sub_type}} </option>
                        @endforeach --}}
                        <option value="theory">Theory</option>
                        <option value="lab">Lab</option>
                    </select>
                    {{-- <span class="error">{{ $errors->first('sub_type') }}</span> --}}
                </div>


    <div class="form-group">
        <label for=""></label>
        <button type="submit" class="btn btn-success">Submit</button>
        <a  class="btn btn-primary m-b-10" href="{{URL::to('subject')}}">All Subject</a>

    </div>



</form>
</div>
</div>
    </div>
</main>

@stop