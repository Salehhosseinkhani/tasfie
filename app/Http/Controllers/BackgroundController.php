<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackgroundController extends Controller
{
    public function store(Request $request)
    {
        // بررسی معتبر بودن فایل
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // ذخیره فایل در مسیر public
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('backgrounds', 'public');

            // مسیر کامل عکس
            $imageUrl = Storage::url($path);

            // می‌توانید مسیر تصویر را به دیتابیس یا هر فایل دیگری ذخیره کنید.

            return response()->json(['imageUrl' => $imageUrl], 200);
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }
}



