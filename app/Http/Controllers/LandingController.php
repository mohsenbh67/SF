<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('landing.products');
    }
    public function shops()
    {
        return view('landing.shops');
    }
}
