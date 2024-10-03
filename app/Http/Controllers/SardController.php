<?php

namespace App\Http\Controllers;

use App\Models\Sard;
use Illuminate\Http\Request;

class SardController extends Controller
{
    public function index()
    {
        $sards = Sard::all();
        return view('sard', compact('sards'));
    }

    // نمایش فرم برای افزودن محصول
    public function create()
    {
        $sards = Sard::all();
        return view('adminsard', compact('sards'));
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
        Sard::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'] *10,
            'sellprice' => $validatedData['sellprice'] *10,
            'image' => $imagePath,
        ]);

        return redirect()->route('sards.create')->with('success', 'Product added successfully.');
    }

    // حذف محصول
    public function destroy($id)
    {
        $sard= Sard::findOrFail($id);
        $sard->delete();

        return redirect()->route('sards.index')->with('success', 'Product deleted successfully.');
    }


    // نمایش صفحه محصول بر اساس slug یا id
    public function tow($slug)
    {
        // بازیابی محصول بر اساس slug
        $sard = Sard::where('slug', $slug)->firstOrFail();

        // ارسال محصول به ویو
        return view('sard.tow', compact('sard'));
    }

}
