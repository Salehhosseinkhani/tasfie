<?php

namespace App\Http\Controllers;


use App\Models\Ghtaat;
use Illuminate\Http\Request;

class GhtaatController extends Controller
{
    // نمایش محصولات در صفحه welcome
    public function index()
    {
        $ghtaats = Ghtaat::all();
        return view('ghtaat', compact('ghtaats'));
    }

    // نمایش فرم برای افزودن محصول
    public function create()
    {
        $ghtaats = Ghtaat::all();
        return view('adminghtaat', compact('ghtaats'));
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
        Ghtaat::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'] *10,
            'sellprice' => $validatedData['sellprice'] *10,
            'image' => $imagePath,
        ]);

        return redirect()->route('ghtaats.create')->with('success', 'Product added successfully.');
    }

    // حذف محصول
    public function destroy($id)
    {
        $ghtaat= Ghtaat::findOrFail($id);
        $ghtaat->delete();

        return redirect()->route('ghtaats.index')->with('success', 'Product deleted successfully.');
    }


    // نمایش صفحه محصول بر اساس slug یا id
    public function add($slug)
    {
        // بازیابی محصول بر اساس slug
        $ghtaat = Ghtaat::where('slug', $slug)->firstOrFail();

        // ارسال محصول به ویو
        return view('ghtaat.add', compact('ghtaat'));
    }

}

