<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <form action="/categories" method="GET">
            <div class="block mb-4 ml-4 rounded-lg">
                <input type="text" class="form-controlblock mb-4 rounded-lg " name="search" placeholder="search here">
                <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Search</button>
            </div>
        </form>
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($categories as $category)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                <a href="{{ route('categories.show', $category->id) }}">
                    <img class="w-full h-48 rounded-lg-top" src="{{ Storage::url($category->image) }}" alt="Image" />
                    <div class="px-6 py-4">


                            <h4
                                class="mb-3 text-xl font-semibold tracking-tight text-green-600 hover:text-green-400 uppercase">
                                {{ $category->name }}</h4>

                    </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</x-guest-layout>
