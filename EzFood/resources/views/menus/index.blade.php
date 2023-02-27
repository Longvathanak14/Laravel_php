<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
         <form action="/menus" method="GET">
            <div class="block mb-4 ml-4 rounded-lg">
                <input type="text" class="form-controlblock mb-4 rounded-lg " name="search" placeholder="search here">
                <button class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Search</button>
            </div>
        </form>
        <!-- order form template -->
<form method="POST" action="/orders">
    @csrf
    <table>
        <thead>
            <tr>
                <th>Menu Item</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>
                        {{ Form::number("items[{$menu->id}]", 0) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit">Place Order</button>
</form>
        <div class="grid lg:grid-cols-4 gap-y-6 table-data">
            @forelse ($menus as $menu)
                <div class="card max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img  class="w-full h-48 rounded-lg-top" src="{{ Storage::url($menu->image) }}" alt="Image" />
                    <div class="px-6 py-4">
                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                            {{ $menu->name }}</h4>
                        <p class="leading-normal text-gray-700">{{ $menu->description }}</p>
                    </div>
                    <div class="flex items-center justify-between p-4">
                        <span class="text-xl text-green-600">${{ $menu->price }}</span>
                    </div>
                </div>
                @empty
                <div>
                    jnsjivjow
                </div>
            @endforelse
        </div>
    </div>
</x-guest-layout>
