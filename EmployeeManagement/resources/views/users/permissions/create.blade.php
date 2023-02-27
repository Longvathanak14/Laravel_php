@extends('Layouts.master')
@section('title', "Create permissions")
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Create New Permission.</h2>
        <hr>
    	<form action="{{ url('users/permissions/create')}}" method="POST">
            @csrf
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" 
                        required value="{{ old('name') }}">
            </div>
            <div class="mb-2">
                <label for="name" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" 
                required value="{{ old('slug') }}">
            </div>
            <input type="submit" class="btn btn-primary" value="Create Permission">
        </form>
    </div>
</main>
    
@endsection