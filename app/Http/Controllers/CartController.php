<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Product $product)
    {
        $currentLoggedInUser = auth()->user();
        if ($currentLoggedInUser) {
            dd('ok');
        }else {
            return back()->withError(__('Please login'));
        }
    }
}
