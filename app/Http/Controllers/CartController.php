<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = [
            "id" => $request->id,
            "name" => $request->name,
            "price" => $request->price,
            "quantity" => $request->quantity,
        ];

        // گرفتن سبد خرید فعلی از سشن
        $cart = session()->get('cart', []);

        // افزودن محصول به سبد خرید
        $cart[$product['id']] = $product;

        // ذخیره سبد خرید به سشن
        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'محصول به سبد خرید اضافه شد.');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);

        return view('cart.show', compact('cart'));
    }
}