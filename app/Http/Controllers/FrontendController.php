<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured_product = Product::where('trending','1')->take(15)->get();
        $minicart = Cart::where('user_id', Auth::id())->get();
        $category = Category::all()->take(15);
         return view('frontend.index',compact('featured_product', 'category', 'minicart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        //
        $category = Category::all();
        $minicart = Cart::where('user_id', Auth::id())->get();
        return view('frontend.category', compact('category','minicart'));
    }
    public function viewcategory($id)
    {
        
       
            $category=Category::where('id',$id)->first();
            $minicart = Cart::where('user_id', Auth::id())->get();
            $subcategory = Subcategory::where('category_id',$category->id)->get();
            return view('frontend.subcategory.index', compact('category','subcategory','minicart'));                                                   
       
    }

    public function viewsubcategory($id)
    {
        
       
            $subcategory=Subcategory::where('id',$id)->first();
            $products = Product::where('subcate_id',$subcategory->id)->get();
            $minicart = Cart::where('user_id', Auth::id())->get();
            return view('frontend.product.index', compact('subcategory','products','minicart'));
       
    }

    public function productview($id,$slug)
    {
        $products =Product::where('slug',$slug)->first();
        $minicart = Cart::where('user_id', Auth::id())->get();
        return view('frontend.product.view',compact('products','minicart'));
    }

    public function searchProduct(Request $request)
    {
        $searched_product = $request->product_name;
       
        if($searched_product == ""){
            return redirect(url('/'));
        }else{
            $product = Product::where("name", "LIKE", "%$searched_product%")->first();
            if($product){
                return redirect('view-subcategory/'.$product->id.'/'.$product->slug);
            }
        }
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
