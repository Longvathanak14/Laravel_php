@extends('Layouts.master')
@section('title', "Users List")
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Users Role.</h2>
        <hr>
        <div class="my-2">
            <a class=" btn btn-sm btn-success mb-2" href="/users/create">
                Create New User
            </a>
            <table class="table table-sm table-striped table-bordered">
                <thead >
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td> {{$loop->iteration}}</td>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>
                            @forelse ($user->roles as $role)
                            <span class="badge rounded-pill text-bg-danger">{{ $role->name}}</span>
                            @empty
                            <h6>No Role yet</h6>
                            @endforelse
                        </td>
                        <td>
                            <a href="/users/assign/roles/{{ $user->id}}"
                                class="btn btn-sm btn-primary">Assign Role</a>
                        </td>
                    </tr>
                    @empty
                    <h2>No Users</h2>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection 