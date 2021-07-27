<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;

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
        $products = Product::paginate(15);
        return view('landing.products' , compact('products'));
    }
    public function shops()
    {
        return view('landing.shops');
    }
}
