<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Cart;

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
        return view('landing.shops');
    }

    public function cart()
    {
        $user_id = auth()->id();
        $cart = Cart::where('user_id', $user_id)->first();
        return view('landing.cart', compact('cart'));
    }

}
