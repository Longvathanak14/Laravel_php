@extends('Layouts.master')
@section('title', "Permissions")
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Role List.</h2>
        <hr>
        <div class="my-2">
            <a class=" btn btn-sm btn-success mb-2" href="{{ url('users/roles/create')}}">
                Create New Role
            </a>
            <table class="table table-striped table-bordered">
                <thead >
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $p)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>{{ $p['name'] }}</td>
                        <td>{{ $p ['slug'] }}</td>
                        <td>
                            @forelse ($p->permissions as $per)
                            <span class="badge bg-secondary">{{ $per->slug}}</span>
                            @empty
                            <h6>No Permission</h6>
                            @endforelse
                        </td>
                        <td style="width: 35%;">
                            <a href="{{url('users/roles/edit',['id'=>$p->id])}}"
                                class="btn btn-sm btn-warning">Edit Role</a>
                            <a href="{{ url('users/roles/assign/permissions',['id'=>$p->id])}}"
                                class="btn btn-sm btn-secondary">Assign Permission</a>
                            <a href="{{ url('users/roles/assign/role',['id'=>$p->id]) }}" 
                                class="btn btn-sm btn-success">Revoke Roles from User</a>
                        </td>
                        <!--/users/assign/roles/-->
                    </tr>
                    @empty
                    <tr colspan="4"> No Users</tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection 