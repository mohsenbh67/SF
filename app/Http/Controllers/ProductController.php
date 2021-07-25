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

    public function index(Request $request)
    {
        $shops = Shop::all();
        $products = Product::query();
        if (auth()->user()->is('admin')) {
            if ($request->s) {
                $products = $products->where('shop_id', $request->s);
            }
        }else {
                $products = Product::where('shop_id',currentShopId());
            }
        if ($request->t) {
            $products = $products->where('title','like', "%$request->t%");
        }

        if ($request->Tr) {
            $products = $products->withTrashed();
        }

        if ($order = $request->o) {
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

        $products = $products->get();
        return view('product.index', compact('products','shops'));
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
        checkPolicy('product', $product);
        $shops = Shop::all();
        return view('product.form', compact('product', 'shops'));
    }


    public function update(Request $request, Product $product)
    {
        checkPolicy('product', $product);
        $data = $request->validate($this->validationRules);
        if (isset($data['image'])  && $data['image']) {
            $data['image']= upload($data['image']);
        }

        $currentUser = auth()->user();
        if ($currentUser->is('admin')) {
            $data['shop_id'] = $request->shop_id;
        }

        $product->update($data);
        return redirect()->route('product.index')->withMessage(__('Success'));
    }


    public function destroy(Product $product)
    {
        checkPolicy('product', $product);
        $product->delete();
        return redirect()->route('product.index')->withMessage(__('Deleted'));
    }

    public function restore($id)
    {
        checkPolicy('product', $product);
        $product = Product::withTrashed()->where('id', $id)->restore();
        return redirect()->route('product.index')->withMessage(__('Success'));
    }
}
