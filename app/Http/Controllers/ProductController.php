<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // نمایش محصولات در صفحه welcome
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
    }

    // نمایش فرم برای افزودن محصول
    public function create()
    {
        $products = Product::all();
        return view('digiadmin', compact('products'));
    }

    // ذخیره محصول جدید
    public function store(Request $request)
    {
        // اعتبارسنجی ورودی‌ها
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'sellprice' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // آپلود فایل تصویر
        $imagePath = $request->file('image')->store('images', 'public');

        // ذخیره محصول در پایگاه داده
        Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'] *10,
            'sellprice' => $validatedData['sellprice'] *10,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.create')->with('success', 'Product added successfully.');
    }

    // حذف محصول
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }


    // نمایش صفحه محصول بر اساس slug یا id
    public function show($slug)
    {
        // بازیابی محصول بر اساس slug
        $product = Product::where('slug', $slug)->firstOrFail();

        // ارسال محصول به ویو
        return view('product.show', compact('product'));
    }

}

