<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart as Order;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::paginate(10);
        return view('order.index', compact('orders'));
    }
    public function show(Order $order)
    {

        return view('order.show', compact('order'));
    }

    public function destroy($id)
    {

    }
}
