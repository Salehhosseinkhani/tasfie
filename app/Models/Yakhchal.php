<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Yakhchal extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'sellprice', 'image', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($yakhchal) {
            // اگر slug هنوز تنظیم نشده باشد، آن را تولید می‌کنیم
            if (empty($yakhchal->slug)) {
                $yakhchal->slug = Str::slug($yakhchal->name);
            }
        });

        static::updating(function ($ghtaat) {
            // اگر نام محصول تغییر کند، slug نیز به‌روزرسانی می‌شود
            if ($yakhchal->isDirty('name')) {
                $yakhchal->slug = Str::slug($yakhchal->name);
            }
        });
    }
}
