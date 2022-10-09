<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class OrderItem extends BaseModel
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function eachPrice()
    {
        return $this->product->customerPrice(Auth::user()->customer);
    }

    public function totalPrice()
    {
        return $this->eachPrice()*$this->quantity;
    }
}
