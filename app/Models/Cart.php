<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $fillable = ['quantity', 'product_id', 'user_id', 'shop_id'];
    public function getProducts()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
