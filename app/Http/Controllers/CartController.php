<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['product.galleries', 'user'])
                        ->where('users_id', Auth::user()->id)
                        ->get();

        $users = User::all()->where('users_id', Auth::user()->id);
        return view('pages.cart', [
            "carts" => $carts,
            "users" => $users
        ]);
    }

    public function delete(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart');
    }

    public function success()
    {
        return view('pages.success', [
            "title" => "success"
        ]);
    }
}
