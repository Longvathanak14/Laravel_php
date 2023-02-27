@extends('layouts.master')
@section('title')
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
<h2 class="text-center">Department List.</h2>
<hr>
<a href="/departments/create" class="btn btn-primary">New Department</a>

<table border="1" class="table table-sm table-bordered table-striped">
    <thead>
        <tr>
            <td>Name</td>
            <td>Description</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($deps as $dep)
            <tr>
                <td>{{ $dep->name }}</td>
                <td>{{ $dep->description }}</td>
                <td>
                    <a href="/departments/edit/{{ $dep->id }}"><i class="bi bi-pencil"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

</main>
@endsection
