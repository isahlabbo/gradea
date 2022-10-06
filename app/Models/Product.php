<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends BaseModel
{
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
    
    public function picture()
    {
        return Storage::url($this->image);
    }

    public function customerPrice(Customer $customer)
    {
        return $this->price - ($customer->coupon->percentage * ($this->price/100));
    }
}
