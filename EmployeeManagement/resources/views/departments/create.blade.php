@extends('layouts.master')
@section('title', 'create')
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
    <form action="{{ url('departments/create') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label for="name">Name</label>
            <input class="form-control" name="name" id="name">
            @error('name')
               <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
               <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"> Create New Department</button>

    </form>
</div>

</main>
@endsection
