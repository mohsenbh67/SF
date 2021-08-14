<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Cart;
use App\Models\CartItem;

class LandingController extends Controller
{
    public function loadpage($page)
    {
        if (method_exists($this, $page)) {
            return $this->$page();
        }else {
            abort(404);
        }
    }

    public function products()
    {
        $products = Product::query();
        if ($t = request('t')) {
            $products = $products->where('title','like', "%$t%");
        }

        if ($order = request('o')) {
            if ($order == 1) {
                $products = $products->orderBy('price', 'DESC');
            }
            if ($order == 2) {
                $products = $products->orderBy('price', 'ASC');
            }
            if ($order == 3) {
                $products = $products->orderBy('created_at', 'DESC');
            }
            if ($order == 4) {
                $products = $products->orderBy('created_at', 'ASC');
            }
        }

        $products = $products->paginate(15);
        return view('landing.products' , compact('products'));
    }

    public function shops()
    {
        $shops = shop::latest()->paginate(10);
        return view('landing.shops', compact('shops'));
    }

    public function showShop(Shop $shop)
    {
        $products = Product::where('shop_id', $shop->id)->paginate(9);
        return view('landing.shop', compact('shop' , 'products'));
    }

    public function cart()
    {
        $user_id = auth()->id();
        $cart = Cart::where('user_id', $user_id)->where('finished' , 0)->first();
        if ($cart) {
            $cart_item = CartItem::where('cart_id', $cart->id)->first();

        }else {
            $cart_item = null;
        }
        return view('landing.cart', compact('cart','cart_item'));
    }

}
