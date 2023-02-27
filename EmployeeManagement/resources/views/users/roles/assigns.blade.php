@extends('Layouts.master')
@section('title', "Create Role")
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Assign Role.</h2>
        <hr>
        <form action="{{ url('users/roles/assign/permissions' , ['id'=>$id]) }}" method="POST">
            @csrf
            @foreach ($permissions as $p  )
                <div class="form-check">
                    <input class="form-check-input"
                    {{ in_array($p->slug, $role_permissions)? 'checked': ''}}
                    type="checkbox" value="{{$p->id}}"
                    name="permission[] "
                    id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{$p->slug}}
                    </label>
                </div>
            @endforeach
            <input class="btn btn-primary" type="submit" value="Assign Permission">
        </form>
    </div>
</main>
@endsection