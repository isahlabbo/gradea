<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Order extends BaseModel
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function updateAmount()
    {
        $amount = 0;
        foreach($this->orderItems as $item){
            $amount += $item->product->customerPrice(Auth::user()->customer)*$item->quantity;
        }
        $this->update(['amount'=>$amount]);
    }
}
