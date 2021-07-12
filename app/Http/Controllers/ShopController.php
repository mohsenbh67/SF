<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        return view('shop.index');
    }

    public function create()
    {
        return view('shop.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Shop $shop)
    {
        //
    }

    public function edit(Shop $shop)
    {
        //
    }

    public function update(Request $request, Shop $shop)
    {
        //
    }

    public function destroy(Shop $shop)
    {
        //
    }
}
