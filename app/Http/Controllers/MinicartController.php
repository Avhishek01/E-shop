<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MinicartController extends Controller
{
    public function viewminicart()
    {
        $minicart = Cart::where('user_id', Auth::id())->get();
        $cartitems = Cart::where('user_id', Auth::id())->get();
        // dd($minicart);
        return view('layouts.inc.frontnavbar', compact('minicart', 'cartitems'));
    }
}
