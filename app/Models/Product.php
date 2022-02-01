<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function purchaseItems() {
        return $this->hasMany(PurchaseItem::class);
    }

    public function salesItems() {
        return $this->hasMany(SaleItem::class);
    }
}
