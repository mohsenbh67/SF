<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];
    protected $appends  = ['pay'];

    public function getPayAttribute()
    {
        return $pay = $this->price -(($this->price * $this->discount)/100);
    }

    public function shop ()
    {
        return $this->belongsTo(Shop::class);
    }
}
