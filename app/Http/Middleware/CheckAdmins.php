<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmins
{

     public function handle(Request $request, Closure $next)
     {
         $user = auth()->user();

         if ($user && ($user->is('admin') || $user->is('shop')) ) {
             return $next($request);
         } else {
             abort(403);
         }
     }
}
