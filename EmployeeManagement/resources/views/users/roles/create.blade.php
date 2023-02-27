@extends('Layouts.master')
@section('title', "Create Role")
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Create New Role.</h2>
        <hr>
        <form action="{{ url('users/roles/create') }}" method="POST">
            @csrf
            <div class="card text-bg-secondary">
                
                <div class="card-body">
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control"
                        required value="{{old('name')}}">
                    </div>
                    
                    <div class="mb-2">
                        <label for="name" class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control"
                        required value="{{ old('slug') }}">
                    </div>
                    
                    <div class="mb-2">
                        <div class="card text-bg-light">
                            <div class="card-header">
                                <h6 class="card-title"> Permission </h6>
                            </div>
                            <div class="card-body">
                                @foreach ($permissions as $p )
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox" value="{{$p->id}}"
                                            name="permissions[]"
                                            id="flexCheckDefault {{ $loop->iteration}}">
                                        <label class="form-check-label"
                                            for="flexCheckDefault{{$loop->iteration}}">

                                            {{ $p->slug }}

                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input class="btn btn-primary" type="submit" value="Create Role">
                </div>
            </div>
        </form>
    </div>
</main>
@endsection