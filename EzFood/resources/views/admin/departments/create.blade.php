<x-admin-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<main style="margin-top: 58px;">
    <div class="container pt-4">
    <form action="{{ route('admin.departments.store')  }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
            <label for="name">Name</label>
            <input class="form-control" name="name" id="name">
            @error('name')
               <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-2">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
               <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"> Create New Department</button>

    </form>
</div>

</main>

</x-admin-layout>
