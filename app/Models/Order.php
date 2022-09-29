<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
