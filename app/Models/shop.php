<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id','desc', 'Opening Day', 'Closing Day','Opening Hours','Closing Hours'];
    public function getProducts(){
        return $this->hasMany(product::class, 'shop_id', 'id');
    }
    public function getUser(){
        return $this->belongsTo(User::class,'shop_id', 'id');
    }
    public function getTransactionDetail(){
        return $this->hasOne(transaction_detail::class,'shop_id');
    }
}
