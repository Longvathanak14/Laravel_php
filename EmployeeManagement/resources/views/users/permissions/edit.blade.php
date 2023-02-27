@extends('Layouts.master')
@section('title', "Edit Permissions")
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Edit Permission.</h2>
        <hr>
    	<form action="{{ url('users/permissions/edit',['id'=>$permissions->id])}}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" 
                        required value="{{$permissions->name}}">
            </div>
            <div class="mb-2">
                <label for="name" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" 
                required value="{{$permissions->name}}">
            </div>
            <input type="submit" class="btn btn-primary" value="Update Permission">
        </form>
    </div>
</main>
    
@endsection