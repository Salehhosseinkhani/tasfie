<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jashnvare;

class AdminJashnvareController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // آپلود و ذخیره عکس
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        // ذخیره اطلاعات جشنواره در پایگاه داده
        Jashnvare::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->back()->with('success', 'اطلاعات جشنواره با موفقیت ذخیره شد.');
    }
}


