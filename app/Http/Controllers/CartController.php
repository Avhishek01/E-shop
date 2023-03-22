<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addproduct(Request $request)
    {
        $product_id =$request->input('product_id');
        $product_qty = $request->input('product_qty');
        if (Cart::where('Prod_id',$product_id)->exists()) 
        {
            Cart::where('Prod_id',$product_id)->increment('prod_qty', $product_qty);
        }
        else
        {
            if(Auth::check())
            {
                $prod_check = Product::where('id',$product_id)->first();
                
                if($prod_check)
                {
                    $cartitem = new Cart();
                    $cartitem->prod_id = $product_id;
                    $cartitem->user_id = Auth::id();
                    $cartitem->prod_qty = $product_qty;
                    $cartitem->save();
                    return response()->json(['status'=>$prod_check->name."Added to cart"]);
                } 
            }
            else
            {
                return response()->json(['status'=> " Login on E-Shop for Add product in cart "]);
            }
        }
        // $cart = Session::get('cart');
        // if(isset($cart[$product_id])){
        //     $cart[$product_id][$product_qty] += 1;
        // }
        // else{
        //     $cart[$product_id][$product_qty] = 1;
        // }
        // Session::put('cart', $cart);
        // return Response::json(['success' => true, 'cart_items' => count(Session::get('cart')), 'message' => 'Cart updated.']);

        
    }

    public function viewcart()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $minicart = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartitems','minicart'));
    }


    public function deleteproduct(Request $request)
    {
        if(Auth::check())
        {
            $prod_id= $request->input('prod_id');
            if(Cart::where('id', $prod_id)->where('user_id',Auth::id())->exists())
            {
                $cartitem = Cart::where('id',$prod_id)->where('user_id',Auth::id())->first();
                $cartitem->delete();
                return response()->json(['status'=> " Product Deleted Successfully "]);                                        
                         
            }                                 
                               
        }           
        else
        {
            return response()->json(['status'=> " Login on E-Shop for Add product in cart "]);
        }
      

    }

    public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
       
        $product_qty = $request->input('prod_qty');
        
        if(Auth::check())
        {
          
            if(Cart::where('id', $prod_id)->where('user_id',Auth::id())->exists())
            {
               
                $cart = Cart::where('id',$prod_id)->where('user_id',Auth::id())->first();
                
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status'=> 'Quantity updated']);
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cartcount()
    {

        $cartcount = Cart::where('user_id', Auth::id())->count();
        
        return response()->json(['count'=>$cartcount]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
