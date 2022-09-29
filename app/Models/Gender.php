<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends BaseModel
{
    public function customers(Type $var = null)
    {
        return $this->hasMany(Customer::class);
    }
}
