@extends('Layouts.master')
@section('title', "Create Role")
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Assign Role.</h2>
        <hr>
        <form action="{{ url('users/assign/roles' , ['id'=>$user->id])}}" method="POST">
            @csrf
            @foreach ($roles as $role)
                <div class="form-check">
                    <input class="form-check-input" {{ in_array($role->slug, $user_roles)?'checked': ''}}type="checkbox" value="{{ $role->id }}" name="roles[]" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{$role->slug}}
                    </label>
                </div>
            @endforeach
            <input class="btn btn-primary" type="submit" value="Assign Roles">
        </form>
    </div>
</main>
@endsection