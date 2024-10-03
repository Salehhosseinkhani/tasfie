<?php

namespace App\Http\Controllers;


use App\Models\Filter;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    // نمایش محصولات در صفحه welcome
    public function index()
    {
        $filters = Filter::all();
        return view('filter', compact('filters'));
    }

    // نمایش فرم برای افزودن محصول
    public function create()
    {
        $filters = Filter::all();
        return view('adminfilter', compact('filters'));
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
        Filter::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'] *10,
            'sellprice' => $validatedData['sellprice'] *10,
            'image' => $imagePath,
        ]);

        return redirect()->route('filters.create')->with('success', 'Product added successfully.');
    }

    // حذف محصول
    public function destroy($id)
    {
        $filter= Filter::findOrFail($id);
        $filter->delete();

        return redirect()->route('filters.index')->with('success', 'Product deleted successfully.');
    }


    // نمایش صفحه محصول بر اساس slug یا id
    public function new($slug)
    {
        // بازیابی محصول بر اساس slug
        $filter = Filter::where('slug', $slug)->firstOrFail();

        // ارسال محصول به ویو
        return view('filter.new', compact('filter'));
    }

}

