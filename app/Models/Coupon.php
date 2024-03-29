<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends BaseModel
{
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
