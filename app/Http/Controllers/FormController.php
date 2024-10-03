<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // نمایش فرم
    public function showForm()
    {
        return view('form');
    }

    // پردازش و ثبت اطلاعات
    public function submitForm(Request $request)
    {
        // اعتبارسنجی داده‌ها
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'mobile' => 'required|regex:/^[0-9]{10,14}$/',
        ]);

        // ذخیره داده‌ها در سشن
        session([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'mobile' => $request->input('mobile'),
        ]);

        // بازگرداندن به فرم همراه با پیام موفقیت
        return redirect()->route('showForm')->with('success', 'درخواست شما با موفقیت ثبت شد.');
    }

    // نمایش صفحه DigiAdmin
    public function showDigiAdmin()
    {
        // بازیابی داده‌ها از سشن
        $data = session()->only(['title', 'description', 'mobile']);

        return view('adminsupport', ['data' => $data]);
    }
}