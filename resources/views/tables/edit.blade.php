@extends('layout.app')
@section('title', 'Edit List')
@section('content')
<div class="row">
    <div class="col-md-6 mt-4 mx-auto">
        <div class="card">
            <div class="card-header"><h2>List<a href="{{url('table')}}" class="btn btn-danger float-end"><i class="bi bi-arrow-left"></i> &nbsp; Back</a></h2>
                <div class="car-body">
                    <form action="{{url('table/' .$tables->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$tables->name}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{$tables->email}}" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date_Of_Birth</label>
                            <input type="date" name="dob" id="dob" class="form-control" value="{{$tables->dob}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mobile</label>
                            <input type="text" name="mob" id="mob" class="form-control" value="{{$tables->mob}}">
                        </div>
                        <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                             @if ($tables->image)<img src="{{ asset('storage/images/' . $tables->image) }}" alt="Image" style="width: 100px; height: 100px;" class="rounded-circle">@endif<br>
                            <input type="file" name="image" id="image" class="form-control" >
                            @if ($errors->has('image'))<div class="fw-light text-danger"><i class="bi bi-exclamation-triangle"></i>&nbsp;{{ $errors->first('image') }}</div>@endif

                        </div>
                        <input type="submit" value="Update" class="btn btn-success float-center d-block mx-auto ">
                    </form>
                </div></div></div></div></div>           
@stop