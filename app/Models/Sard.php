<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Sard extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'sellprice', 'image', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($sard) {
            // اگر slug هنوز تنظیم نشده باشد، آن را تولید می‌کنیم
            if (empty($sard->slug)) {
                $sard->slug = Str::slug($sard->name);
            }
        });

        static::updating(function ($ghtaat) {
            // اگر نام محصول تغییر کند، slug نیز به‌روزرسانی می‌شود
            if ($sard->isDirty('name')) {
                $sard->slug = Str::slug($sard->name);
            }
        });
    }
}
