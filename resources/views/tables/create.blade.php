@extends('layout.app')
@section('title', 'Add List')
@section('content')
<div class="row">
    <div class="col-md-6 mt-4 mx-auto">
        <div class="card">
            <div class="card-header"><h2>List<a href="{{url('table')}}" class="btn btn-danger float-end"><i class="bi bi-arrow-left"></i> &nbsp; Back</a></h2>
                    <div class="car-body">
                        <form action="{{url('table')}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name">
                            @if ($errors->has('name'))<div class="fw-light text-danger"><i class="bi bi-exclamation-triangle"></i>&nbsp;{{ $errors->first('name') }}</div>@endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="absds@example.com">
                            @if ($errors->has('email'))<div class="fw-light text-danger"><i class="bi bi-exclamation-triangle"></i>&nbsp;{{ $errors->first('email') }}</div>@endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date_Of_Birth</label>
                            <input type="date" name="dob" id="dob" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mobile</label>
                            <input type="text" name="mob" id="mob" class="form-control">
                            @if ($errors->has('mob'))<div class="fw-light text-danger"><i class="bi bi-exclamation-triangle"></i>&nbsp;{{ $errors->first('mob') }}</div>@endif
                        </div>
                        <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ($errors->has('image'))<div class="fw-light text-danger"><i class="bi bi-exclamation-triangle"></i>&nbsp;{{ $errors->first('image') }}</div>@endif
                        </div>
                        <input type="submit" value="Submit" class="btn btn-success">
                        <input type="reset"  value="Reset" class="btn btn-danger float-end">
                    </form>
                </div></div></div></div></div>           
@stop