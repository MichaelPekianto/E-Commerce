<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable=['name','category', 'desc','price','stock', 'shop_id','image'];
    public function getShop(){
        return $this->belongsTo(shop::class, 'shop_id', 'id');
    }
    public function getCategory(){
        return $this->belongsTo(category::class,'category', 'id');
    }
    public function getTransactionDetail(){
        return $this->hasMany(transaction_detail::class, 'product_id');
    }
    public function getCart(){
        return $this->hasMany(Cart::class,'product_id');
    }
}
