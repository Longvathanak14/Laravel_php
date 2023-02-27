@extends('layouts.master')
@section('title','edit')
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
    <form action="{{ url('departments/edit',[$dep->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label for="name" >Name</label>
            <input class="form-control" name="name" id="name" value="{{ $dep->name }}" >
            @error('name')
               <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" >{{ $dep->description }}</textarea>
            @error('description')
               <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-sm btn-success">Update Department</button>
    </form>
</div>

</main>
@endsection
