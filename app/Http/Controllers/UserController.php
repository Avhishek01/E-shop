<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        $minicart = Cart::where('user_id', Auth::id())->get();
        return view('frontend.orders.index',compact('orders','minicart'));
    }

    public function view($id)
    {
        $orders = Order::where('id',$id)->where('user_id', Auth::id())->first();
        $minicart = Cart::where('user_id', Auth::id())->get();
        return view('frontend.orders.view',compact('orders','minicart'));
    }
}
