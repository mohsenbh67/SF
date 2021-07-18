<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $validationRules = [
        'title' => 'required|string|between:3,100',
        'price' => 'required|integer',
        'discount' =>'nullable|integer|between:0,100',
        'image' => 'nullable|image|max:2048',
        'description' => 'string|nullable',
    ];

    public function __construct()
    {
        $this->middleware(['auth','admins']);
    }

    public function index()
    {

        if (auth()->user()->is('admin')) {
            $products = Product::all();
        }else {
                $products = Product::where('shop_id',currentShopId())->get();
            }

        return view('product.index', compact('products'));
    }

    public function create()
    {
        $product = new Product;
        $shops = Shop::all();
        return view('product.form', compact('product', 'shops'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules);
        $currentUser = auth()->user();
        if ($currentUser->is('admin')) {
            $data['shop_id'] = $request->shop_id;
        }else {
            $shop = Shop::where('user_id', auth()->id())->firstOrFail();
            $data['shop_id'] = $shop->id;
        }

        if (!$data['discount']) {
            $data['discount'] = 0;
        }
        if (isset($data['image'])  && $data['image']) {
            $data['image']= upload($data['image']);
        }

        Product::create($data);
        return redirect()->route('product.index')->withMessage(__('Success'));
    }

    public function edit(Product $product)
    {
        $shops = Shop::all();
        return view('product.form', compact('product', 'shops'));
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->validate($this->validationRules);
        if (isset($data['image'])  && $data['image']) {
            $data['image']= upload($data['image']);
        }

        $product->update($data);
        return redirect()->route('product.index')->withMessage(__('Success'));
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->withMessage(__('Deleted'));
    }
}
