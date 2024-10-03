<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'postal_code' => 'required|string|max:20',
            'product_name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'total' => 'required|numeric',
        ]);

        // Create a new order after payment success
        // Assuming payment is successful, you would handle the logic here
        Order::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
        ]);

        // Redirect to admin order view or a success page
        return redirect()->back()->with('success', 'درخواست شما با موفقیت ثبت شد');
    }
    public function index()
    {
        // Get all orders from the database
        $orders = Order::all();

        // Pass the orders to a view
        return view('adminorder', compact('orders'));
    }
}

