<?php

namespace App\Http\Middleware;

use App\Models\product;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidateAccountid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $product = product::findorfail($request->id);
        if($user -> id != $product->Author_id){
            return response()->json(['message'=>'data not found']);
        }


        return $next($request);
    }
}
