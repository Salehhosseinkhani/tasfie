<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Filter extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'sellprice', 'image', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($filter) {
            // اگر slug هنوز تنظیم نشده باشد، آن را تولید می‌کنیم
            if (empty($filter->slug)) {
                $filter->slug = Str::slug($filter->name);
            }
        });

        static::updating(function ($filter) {
            // اگر نام محصول تغییر کند، slug نیز به‌روزرسانی می‌شود
            if ($filter->isDirty('name')) {
                $filter->slug = Str::slug($filter->name);
            }
        });
    }
}
