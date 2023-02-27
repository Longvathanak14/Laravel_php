@extends('Layouts.master')
@section('title', "Permissions")
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Permission Info.</h2>
        <hr>
        <div class="my-2">
            <a class=" btn btn-success" href="{{ url('users/permissions/create') }}">
                Create New Permission
            </a>
            <hr>
            <table class="table table-striped table-bordered">
                <thead >
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p['name'] }}</td>
                        <td>{{ $p['slug'] }}</td>
                        <td style="width: 30%;">
                            <a href="{{url('users/permissions/edit',['id'=>$p->id])}}"
                                class="btn btn-sm btn-warning">Edit Role</a>
                            
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

