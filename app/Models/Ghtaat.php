<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ghtaat extends Model
{
    protected $fillable = ['name', 'description', 'price', 'sellprice', 'image', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($ghtaat) {
            // اگر slug هنوز تنظیم نشده باشد، آن را تولید می‌کنیم
            if (empty($ghtaat->slug)) {
                $ghtaat->slug = Str::slug($ghtaat->name);
            }
        });

        static::updating(function ($ghtaat) {
            // اگر نام محصول تغییر کند، slug نیز به‌روزرسانی می‌شود
            if ($ghtaat->isDirty('name')) {
                $ghtaat->slug = Str::slug($ghtaat->name);
            }
        });
    }
}
