<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function products_order()
    {
        return $this->belongsTo(ProductOrders::class, 'id');
    }
}
