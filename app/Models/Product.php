<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    // فیلدهایی که اجازه mass assignment دارند
    protected $fillable = ['name', 'description', 'price', 'sellprice', 'image', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            // اگر slug هنوز تنظیم نشده باشد، آن را تولید می‌کنیم
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            // اگر نام محصول تغییر کند، slug نیز به‌روزرسانی می‌شود
            if ($product->isDirty('name')) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
}

