<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    public function getTransactionDetail(){
        return $this->hasMany(transaction_detail::class, 'transaction_id', 'id');
    }
}
