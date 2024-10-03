<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Specify the table if it doesn't follow Laravel's convention
    protected $table = 'orderproduct';

    // Define the fillable fields
    protected $fillable = [
        'product_name',
        'price',
        'quantity',
        'total',
        'name',
        'phone_number',
        'address',
        'postal_code',
    ];
}