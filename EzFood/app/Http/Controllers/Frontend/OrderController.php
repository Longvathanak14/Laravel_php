<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\HTML;
use App\Http\Requests\OrderStoreRequest;

class OrderController extends Controller
{
    //
    public function store(OrderStoreRequest $request)
    {
        // Create a new order
        $order = new Order;

        // Save the order to the database
        if ($order->save()) {
            // Loop through the items in the request
            foreach ($request->input('items', []) as $menuId => $quantity) {
                // Skip the item if the quantity is 0
                if ($quantity <= 0) {
                    continue;
                }

                // Create a new order item
                $item = new OrderItem;
                $item->order_id = $order->id;
                $item->menu_id = $menuId;
                $item->quantity = $quantity;

                // Save the order item to the database
                if (!$item->save()) {
                    // If the order item could not be saved, rollback the transaction
                    // and redirect the user with an error message
                    \DB::rollback();
                    return redirect()->back()->with('error', 'An error occurred while saving the order');
                }
            }

            // If all order items were saved successfully, commit the transaction
            \DB::commit();

            // Redirect the user to the order show page
            return redirect('/orders/' . $order->id);
        } else {
            // If the order could not be saved, redirect the user with an error message
            return redirect()->back()->with('error', 'An error occurred while saving the order');
        }
    }

    public function show(Order $order)
    {
        $items = $order->items;
        $total = $items->sum(function ($item) {
            return $item->menu->price * $item->quantity;
        });

        return view('menus.orders.show', compact('order', 'items', 'total'));
    }
}
