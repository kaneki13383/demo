<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrders extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
