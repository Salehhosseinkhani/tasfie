<?php

namespace App\Http\Controllers;


use App\Models\Yakhchal;
use Illuminate\Http\Request;

class YakhchalController extends Controller
{
    // نمایش محصولات در صفحه welcome
    public function index()
    {
        $yakhchals = Yakhchal::all();
        return view('yakhchal', compact('yakhchals'));
    }

    // نمایش فرم برای افزودن محصول
    public function create()
    {
        $yakhchals = Yakhchal::all();
        return view('adminyakhchal', compact('yakhchals'));
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
        Yakhchal::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'] *10,
            'sellprice' => $validatedData['sellprice'] *10,
            'image' => $imagePath,
        ]);

        return redirect()->route('yakhchals.create')->with('success', 'Product added successfully.');
    }

    // حذف محصول
    public function destroy($id)
    {
        $yakhchal= Yakhchal::findOrFail($id);
        $yakhchal->delete();

        return redirect()->route('yakhchals.index')->with('success', 'Product deleted successfully.');
    }


    // نمایش صفحه محصول بر اساس slug یا id
    public function one($slug)
    {
        // بازیابی محصول بر اساس slug
        $yakhchal = Yakhchal::where('slug', $slug)->firstOrFail();

        // ارسال محصول به ویو
        return view('yakhchal.one', compact('yakhchal'));
    }

}

