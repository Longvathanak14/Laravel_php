@extends('Layouts.master')
@section('title', "Create Role")
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Edit Role.</h2>
        <hr>
        <form action="{{ url('users/roles/edit',['id'=>$role->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control"
                required value="{{$role->name}}">
            </div>
            <div class="mb-2">
                <label for="name" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control"
                required value="{{$role->slug}}">
            </div>
            <input type="submit" class="btn btn-primary" value="UPDATE ROLE">
        </form>
    </div>
</main>
@endsection
