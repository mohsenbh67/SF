<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index()
    {
        $shops = Shop::all();
        return view('shop.index', compact('shops'));
    }

    public function create()
    {
        return view('shop.create');
    }

    public function store(Request $request)
    {

        // shop Request validate
        $data = $request->validate([
            'title' => 'required|string|between:3,100|unique:shops,title',
            'first_name' => 'required|string',
            'last_name' =>'required|string',
            'phone' => 'required|string|size:11',
            'email' => 'required|email|unique:users,email',
            'user_name' => 'required|unique:users,name',
            'address' => 'nullable',
        ]);


        // User Create in user table
        $pass = rand(1000,9999);
        $user = User::create([
            'name' => $request->user_name,
            'email' => $request->email,
            'role' => 'shop',
            'email_verified_at' => now(),
            'password' => bcrypt($pass),
        ]);

        // shop create in shop table
        Shop::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);

        // redirect after ACC create
        return redirect()->route('shop.index')->withMessage(__('Success'));
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
