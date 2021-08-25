<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart as Order;
use App\Models\CartItem ;
use App\Models\Shop;
use App\Models\Product;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['auth', 'admin'])->only('destroy');
    }


    public function index()
    {
        $currentLoggedInUser = auth()->user();

        if ($currentLoggedInUser->role == 'shop') {
            $shop = Shop::where('user_id', $currentLoggedInUser->id)->first();
            $pids = Product::where('shop_id', $shop->id)->pluck('id')->toArray();
            $items = CartItem::whereIn('product_id',$pids)->paginate(10);

            return view('order.shop_index', compact('items'));

        }else {
            $orders = Order::query();
            if ($currentLoggedInUser->role == 'user') {
                $orders = $orders->where('user_id' , $currentLoggedInUser->id)->get();
            }
            $orders = $orders->paginate(10);
            return view('order.index', compact('orders'));
        }

    }
    public function show(Order $order)
    {

        return view('order.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        CartItem::where('cart_id', $order->id)->delete();
        return back()->withMessage(__('Deleted'));
    }
}
