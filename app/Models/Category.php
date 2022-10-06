<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function products()
    {
        $counts = 0;
        foreach ($this->collections as $collection) {
            $counts += count($collection->products);
        }
        return $counts;
    }
}
