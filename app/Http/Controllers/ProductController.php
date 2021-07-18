<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','admins']);
    }

    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $product = new Product;
        return view('product.form', compact('product'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|between:3,100',
            'price' => 'required|integer',
            'discount' =>'nullable|integer|between:0,100',
            'image' => 'nullable|image|max:2048',
            'description' => 'string|nullable',
        ]);


        $shop = Shop::where('user_id', auth()->id())->firstOrFail();
        if ($data['image'] && isset($data['image'])) {
            $data['image']= upload($data['image']);
        }
        $data['shop_id'] = $shop->id;

        Product::create($data);
        return redirect()->route('product.index')->withMessage(__('Success'));
    }

    public function edit(Product $product)
    {
        return view('product.form', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->withMessage(__('Deleted'));
    }
}
