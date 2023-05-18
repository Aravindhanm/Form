@extends('layout.app')
@section('title', 'List')
@section('content')
<div class="row">
            <div class="col-md-12 mt-4">

                        @if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
                        @if (session('delete'))<div class="alert alert-danger">{{ session('delete') }}</div>@endif
                        @if (session('error'))<div class="alert alert-danger">{{ session('delete') }}</div>@endif

<form action="{{ url('/table') }}" method="GET">
                <div class="input-group mb-3">
                    <a href="{{url('table')}}" class="btn btn-danger float-end"><i class="bi bi-arrow-left"></i> </a>
                    <input type="text" name="search"  class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-success"><i class="bi bi-search"></i> &nbsp; Search</button>
                </div>
</form>

     <div class="card">
         <div class="card-header">
                <h2>List
                <a href="{{url('/table/create')}}" class="btn btn-success float-end"> <i class="bi bi-plus-square"></i> &nbsp; Add New</a>
                </h2>
                </div>

            <div class="card-body">
                <div class="table-responsive">
<table class="table table-bordered table-striped"> 
                    <thead>
                        <tr>
                            <th>Profile</th>
                            <th><a href="{{ route('table.index', ['sort' => 'name', 'sort_order' => ($sort === 'name' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search, 'page' => $tables->currentPage()]) }}" style="text-decoration:none;  color:black;"><i class="bi bi-filter"></i>&nbsp;Name</a></th>
                            <th><a href="{{ route('table.index', ['sort' => 'email', 'sort_order' => ($sort === 'email' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search, 'page' => $tables->currentPage()]) }}" style="text-decoration:none;  color:black;"><i class="bi bi-filter"></i>&nbsp;Email</a></th>
                            <th>Date_Of_Birth</th>
                            <th><a href="{{ route('table.index', ['sort' => 'mob', 'sort_order' => ($sort === 'mob' && $sortOrder === 'asc') ? 'desc' : 'asc', 'search' => $search, 'page' => $tables->currentPage()]) }}" style="text-decoration:none;  color:black;"><i class="bi bi-filter"></i>&nbsp;Mobile</a></th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                
                    <tbody>
                        @foreach($tables as $item)
                        <tr>                
                        <td>@if ($item->image)<img src="{{ asset('storage/images/' . $item->image) }}" alt="Image" style="width:70px; height:70px;" class="rounded-circle">@else   No Image  @endif </td> 
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->dob}}</td>
                        <td>{{$item->mob}}</td>
                        <td><a href="{{ url('/table/' . $item->id . '/edit') }}" title="Edit Student" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a></td>
                        <td>
                         <form method="POST" action="{{ url('/table' . '/' . $item->id) }}" >
                            {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form></td></tr>@endforeach
                    </tbody>
 </table>{{ $tables->appends(request()->except('page'))->links() }}</div></div></div></div></div>
@endsection