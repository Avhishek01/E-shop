<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MinicartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// front end routes
Route::get('/',[FrontendController::class, 'index']);
Route::get('cat',[FrontendController::class, 'category']);
Route::get('view-category/{id}',[FrontendController::class, 'viewcategory']);
Route::get('view-subcategory/{id}',[FrontendController::class, 'viewsubcategory']);
Route::get('view-subcategory/{id}/{slug}',[FrontendController::class, 'productview']);//product view
Route::Post('update-product',[FrontendController::class, 'updateproduct']);

Route::Post('searchproduct',[FrontendController::class, 'searchProduct']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//cart routes                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
Route::post('add-to-cart',[CartController::class, 'addproduct']);
Route::post('delete-cart-item',[CartController::class,'deleteproduct']);
Route::Post('update-cart',[CartController::class,'updatecart']);
Route::get('load-cart-data',[CartController::class,'cartcount']);
Route::get('minicart',[MinicartController::class, 'viewminicart']);

Route::middleware(['auth'])->group(function(){
    Route::get('cart',[CartController::class, 'viewcart']);
    
    //checkout controllers
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class,'placeorder']);

    //order detail routes           
    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-orders/{id}', [UserController::class, 'view']);
    
});

//admin routes

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard',[App\Http\Controllers\Admin\FrontendController::class, 'index']);
    
    //category routes
    Route::get('categories',[CategoryController::class, 'index']);
    Route::get('add-category',[CategoryController::class, 'add']);
    Route::post('insert-category',[CategoryController::class, 'insert']);
    Route::get('edit/{id}',[CategoryController::class, 'edit']);
    Route::put('update-data/{id}',[CategoryController::class, 'update']);
    Route::get('distroy/{id}',[CategoryController::class, 'destroy']);
    Route::resource('category', CategoryController::class);


    //subcategory routes
    Route::get('subcategories',[SubCategoryController::class,'index']);
    Route::get('add-subcategory',[SubCategoryController::class, 'create']);
    Route::post('insert-subcategory',[SubCategoryController::class, 'store']);
    Route::get('subedit/{id}',[SubCategoryController::class, 'edit']);
    Route::put('subupdate/{id}',[SubCategoryController::class, 'update']);
    Route::get('subdestroy/{id}',[SubCategoryController::class, 'destroy']);
    Route::resource('subcategory', SubCategoryController::class);
    Route::get('subcategories/{id}', [SubCategoryController::class,'getStates']);
    
    //products routes
    Route::get('products',[ProductController::class,'index']);
    Route::get('add-products',[ProductController::class,'create']);
    Route::post('insert-products',[ProductController::class,'store']);
    Route::get('proedit/{id}',[ProductController::class,'edit']);
    Route::put('update-product/{id}',[ProductController::class,'update']);
    Route::get('destroy/{id}',[ProductController::class, 'destroy']);
    Route::resource('product', ProductController::class);

     //order list in admin panel

    Route::get('/orders',[UserListController::class,'index']);
    Route::get('admin/view-orders/{id}',[UserListController::class,'view']);
    Route::put('update-order/{id}',[UserListController::class,'updateorder']);
    // Route::get('destroy/{id}',[UserListController::class,'destroy']);

     //user list in admin panel
     Route::get('users',[DashboardController::class,'users']);
     Route::get('view-users/{id}',[DashboardController::class,'viewuser']);
     Route::get('destroy/{id}',[DashboardController::class,'destroy']);

});