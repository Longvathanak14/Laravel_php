@extends('layouts.master')
@section('title', 'create')
@section('content')
<main style="margin-top: 58px;">
    <div class="container pt-4">
        <h2 class="text-center">Create New Employee.</h2>
        <hr>
    <form action="{{ url('employees') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-7">
                <div class="mb-2">
                    <label for="first_name">First Name: </label>
                    <input class="form-control" name="first_name" id="first_name" placeholder="First Name" >
                    @error('firs_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="last_name">Last Name: </label>
                    <input class="form-control" name="last_name" id="last_name" placeholder="Last Name" >
                    @error('last_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="department">Department: </label>
                    <select name="department_id" id="department" class="form-select">
                        <option value="" Style="display : none;">Select Department</option>
                        @foreach ($deps as $dep)
                            <option value="{{$dep->id}}">{{$dep->name}}</option>
                        @endforeach

                    </select>
                    @error('department_id')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="email">Email: </label>
                    <input class="form-control" name="email" id="email" placeholder="Email" >
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div>
                    <label for="phone">Phone:</label>
                    <input class="form-control" name="phone" id="phone" placeholder="Phone" >
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-sm-5">
                <div class="row">
                    <div class="col-12">
                        <img src="" alt="profile" id="profile">
                    </div>
                    <input type="file" name="photo" accept="image/*" class="mt-2">
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-sm btn-success">New Employee</button>
    </form>
    <script>
        let profile = document.querySelector("input[type=file]");
        profile.addEventListener("change", function(e){
            var img =document.querySelector("#profile");
            img.setAttribute("src", window.URL.createObjectURL(e.target.files[0]));
            img.setAttribute("style","display:block;width:100%;height:300px;object-fit:fill;");
            output.onload = function(){
                URL.revokeObjectURL(output.src)// free memory
        }
    });
    </script>
    </div>

  </main>
@endsection
