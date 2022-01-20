<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['group_id', 'name', 'email', 'address', 'phone'];

    public function group() {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function sales() {
        return $this->hasMany(SaleInvoice::class);
    }

    public function purchases() {
        return $this->hasMany(PurchaseInvoice::class);
    }


    public function receipts() {
        return $this->hasMany(Receipt::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
