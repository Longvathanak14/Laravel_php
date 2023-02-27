
@extends('layouts.master')
@section('title')
@section('content')
<main style="margin-top:30px;">
<div class="container pt-4">
<h2 class="text-center">Employee Info.</h2>
<a href="/employees/create"  class="btn btn-primary">New Employee</a>
<hr>
@if(Session::has('message'))
        <div class="alert alert-warning alert-dismissable fade show" role="alert">
            <div>
                {{ Session::get('message') }}
            </div>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                
            </button>

        </div>
@endif
        <div class="box box-primary">
            <form action="/employees" method="GET">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Search</span>
                    <input type="text" name="search" class="form-control" placeholder="type somthing here to search">
                    <button class="btn btn-success">Search</button>
                </div>
            </form>
        </div>

<table class="table" border="1">
    <thead>
        <tr>
            <th >First Name</th>
            <th >Last Name</th>
            <th>Email</th>
            <th>Department</th>
            <th >Phone</th>
            
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($emps as $emp)
            <tr>
                <td>{{ $emp->first_name }}</td>
                <td>{{ $emp->last_name }}</td>
                <td>{{ $emp->email }}</td>
                <td>{{ $emp->department->name }}</td>
                <td>{{ $emp->phone }}</td>
                
                <td style="width: 15%;">
                    <form action="{{ url('employees',['id'=>$emp->id]) }}" method="POST"
                        class="d-flex justify-content-around">
                        @csrf
                        @method("DELETE")

                    <a href="/employees/{{ $emp->id }}/edit" ><i class="bi bi-pencil"></i></a>

                    <a href="/employees/{{$emp->id}}"><i class="bi bi-eye-fill"></i></a>

                    <a href="javascript:void(0)" onclick="this.parentElement.submit();" >
                        <i class="bi bi-trash3"></i></a>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>            
</table>

      
    </div>

  </main>
@endsection
