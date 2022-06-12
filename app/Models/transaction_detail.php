<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction_detail extends Model
{
    use HasFactory;
    public $fillable = ['quantity', 'product_id',  'user_id', 'transaction_id', 'shop_id'];
    public function getTransaction(){
        return $this->belongsTo(transaction::class, 'transaction_id', 'id');
    }
    public function getProducts(){
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
    public function getShop(){
        return $this->belongsTo(shop::class,'shop_id', 'id');
    }
}
