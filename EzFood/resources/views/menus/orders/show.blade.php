<!-- order summary template -->
<x-guest-layout>
<table>
    <thead>
        <tr>
            <th>Menu Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->menu->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ $item->menu->price }}</td>
                <td>${{ $item->menu->price * $item->quantity }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total:</td>
            <td>${{ $total }}</td>
        </tr>
    </tfoot>
</table>
</x-guest-layout>
