@extends('layouts.master')
@section('title','create')
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Employee Detail.</h2>
        <hr>
<div class="row" style="background: #eee;">
    <div class="col-sm-8">
        <dl class="row">
            <dt class="col-sm-2">Firstname</dt>
            <dd class="col-sm-12">{{$emp->first_name}}</dd>
            <dt class="col-sm-2">Lastname</dt>
            <dd class="col-sm-12">{{$emp->last_name}}</dd>
            <dt class="col-sm-2">Email</dt>
            <dd class="col-sm-12">{{$emp->email}}</dd>
            <dt class="col-sm-2">Phone</dt>
            <dd class="col-sm-12">{{$emp->phone}}</dd>
        </dl>
    </div>
    <div class="col-sm-4" style="background-color: rebeccapurple;">
        <img src="/storage/employees/profile/{{ $emp->image_path }}"
            style="width:100%;height:350px;object-fit:cover;">
    </div>
    <div class="col-sm-12">
        <a href="/"  class="btn btn-primary">Back to list</a> | <a href="/employees/{{ $emp->id }}/edit" class="btn btn-primary">Edit Employee</a>
    </div>
</div>
</div>

</main>
@endsection
