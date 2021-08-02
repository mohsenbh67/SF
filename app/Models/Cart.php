<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];
    protected $appends  = ['sum'];

    public function getSumAttribute()
    {
        return CartItem::where('cart_id', $this->id)->sum('payable');
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

}
