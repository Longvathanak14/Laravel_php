
@extends('layouts.master')
@section('title', 'create')
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Delete Employee.</h2>
        <hr>
    <dl class="row">
        <dt class="col-sm-2">First Name</dt>
        <dd class="col-sm-12">{{$emp->first_name}}</dd>
        <dt class="col-sm-2">Last Name</dt>
        <dd class="col-sm-12">{{$emp->last_name}}</dd>
        <dt class="col-sm-2">Email</dt>
        <dd class="col-sm-12">{{$emp->email}}</dd>
        <dt class="col-sm-2">Phone</dt>
        <dd class="col-sm-12">{{$emp->phone}}</dd>
    </dl>
    <form method="POST" action="/employees/{{ $emp->id }}/delete">
        @csrf
        @method("DELETE")
        <h3>Do you want to delete ?</h3>
        <button type="submit" class="btn btn-sm btn-warning" >Delete</button>
    
    </form>
    <a href="/">Back to list</a>
</div>

</main>
@endsection
