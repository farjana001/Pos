<?php

namespace App\Models;
use App\Models\Group;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ['group_id', 'name', 'email', 'address', 'phone'];

    public function groups() {
        return $this->belongsTo(Group::class);
    }
}
