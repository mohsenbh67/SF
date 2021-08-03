<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
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
    public function isInCart()
    {
        $user = auth()->user();
        if ($user) {
            $cart = Cart::where('user_id', $user->id)->where('finished', 0)->first();
            if ($cart) {
                return $cart_item = CartItem::where('cart_id',$cart->id)->where('product_id',$this->id)->first();
            }
        }
    }
}
