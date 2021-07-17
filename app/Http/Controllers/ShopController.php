<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Notifications\NewShop;
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
        $shop = new Shop;
        return view('shop.form', compact('shop'));
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
            'address' => 'required',
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
        $shop = Shop::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);

        $user->notify(new NewShop($shop->last_name,$user->email,$pass));

        // redirect after ACC create
        return redirect()->route('shop.index')->withMessage(__('Success'));
        // Notify User after ACC create
    }

    public function edit(Shop $shop)
    {
        return view('shop.form', compact('shop'));

    }

    public function update(Request $request, Shop $shop)
    {

        $data = $request->validate([
            'title' => 'required|string|between:3,100|unique:shops,title, '.$shop->id,
            'first_name' => 'required|string',
            'last_name' =>'required|string',
            'phone' => 'required|string|size:11',
            'address' => 'required',
        ]);

        $shop->update($data);
        return redirect()->route('shop.index')->withMessage(__('Success'));

    }

    public function destroy(Shop $shop)
    {
        User::where('id',$shop->user_id)->delete();
        $shop->delete();
        return redirect()->route('shop.index')->withMessage(__('Deleted'));
    }
}
