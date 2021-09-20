<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes(['verify' => true]);

//Auth::routes();
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth','adminauth']], function()
{

Route::resource('categorys', App\Http\Controllers\CategorysController::class);

Route::resource('subcategories', App\Http\Controllers\SubcategoryController::class);

Route::resource('parentcategories', App\Http\Controllers\ParentcategoryController::class);

Route::resource('childcategories', App\Http\Controllers\ChildcategoryController::class);

Route::resource('products', App\Http\Controllers\ProductController::class);

Route::resource('productPartNumbers', App\Http\Controllers\Product_part_numberController::class);

Route::resource('specifications', App\Http\Controllers\SpecificationController::class);

Route::resource('specificationTypes', App\Http\Controllers\Specification_typeController::class);



Route::post('getspecificationtype',[App\Http\Controllers\Specification_typeController::class, 'getspecificationtype'])->name('getspecificationtype');

Route::get('order', [App\Http\Controllers\OrderController::class,'index'])->name('order.index');
Route::get('getOrders',  [App\Http\Controllers\OrderController::class,'getOrders'])->name('order.list');
Route::get('view/{order_id}',  [App\Http\Controllers\OrderController::class,'orderview'])->name('order.view');
Route::post('confirmorder',  [App\Http\Controllers\OrderController::class,'confirmorder'])->name('confirm.order');

Route::get('settings', [App\Http\Controllers\SettingController::class,'index'])->name('settings');
Route::post('store', [App\Http\Controllers\SettingController::class,'store'])->name('setting.store');

});


Route::prefix('website')->group(function () {
    Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');
    Route::get('/listparent/{subcat_id}', [App\Http\Controllers\FrontendController::class, 'parentcats'])->name('website.parentcats');
    Route::get('/parts/{product_id}', [App\Http\Controllers\FrontendController::class, 'productpartnumber'])->name('website.productpartnumber');
    Route::get('/products/{childategory_id}', [App\Http\Controllers\FrontendController::class, 'products'])->name('website.products');
    Route::get('/partno_product/{product_id}', [App\Http\Controllers\FrontendController::class, 'partno_product'])->name('website.partno_product');
    Route::get('/partnumber/{partno_id}', [App\Http\Controllers\FrontendController::class, 'partnumberpage'])->name('website.partnumberpage');
    // parentcategory
    Route::get('/listparents/{childategory_id}', [App\Http\Controllers\FrontendController::class, 'listparents'])->name('website.listparents');
    Route::get('/login',[App\Http\Controllers\UserController::class, 'login'])->name('website.userlogin');
    Route::get('/profile',[App\Http\Controllers\UserController::class, 'profile'])->name('website.profile');

});

//Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\VerificationController::class, 'verify']); // Make sure to keep this as your route name
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\VerificationController::class, 'verify'])->name('verification.verify'); // Make sure to keep this as your route name
Route::get('registermail', [App\Http\Controllers\VerificationController::class, 'registermail'])->name('registermail'); // Make sure to keep this as your route name


Route::get('adminlogin',[App\Http\Controllers\Auth\LoginController::class, 'adminlogin'])->name('adminlogin');

Route::post('adminauth',[App\Http\Controllers\Auth\LoginController::class, 'adminauth'])->name('adminauth');


Route::post('emailcheck',[App\Http\Controllers\Auth\RegisterController::class, 'emailcheck'])->name('emailcheck');
Route::post('mobilecheck',[App\Http\Controllers\Auth\RegisterController::class, 'mobilecheck'])->name('mobilecheck');


Route::post('authlogin',[App\Http\Controllers\UserController::class, 'postlogin'])->name('authlogin');
//Route::post('authlogin',[App\Http\Controllers\UserController::class, 'postlogin'])->name('authlogin');
Route::post('logout',[App\Http\Controllers\UserController::class, 'authlogout'])->name('authlogout');



Route::post('addtocart',[App\Http\Controllers\CartController::class, 'addtocart'])->name('add-to-cart');
Route::get('/cartloadbyajax',[App\Http\Controllers\CartController::class, 'cartloadbyajax'])->name('load-cart-data');
Route::get('/cartdata',[App\Http\Controllers\CartController::class, 'cartdata'])->name('cartdata');
Route::get('/clearcart',[App\Http\Controllers\CartController::class, 'clearcart'])->name('clear-cart');
Route::post('update-to-cart',[App\Http\Controllers\CartController::class, 'updatetocart'])->name('update-to-cart');
Route::delete('delete-from-cart',[App\Http\Controllers\CartController::class, 'deletefromcart'])->name('delete-from-cart');

//Route::get('add-to-cart/{id}', [ProductController::class, 'addtocart'])->name('add.to.cart');


Route::get('/website/product/{childcat_id}', [App\Http\Controllers\FrontendController::class, 'product'])->name('website.product');
Route::get('/website/part/{product_id}', [App\Http\Controllers\FrontendController::class, 'part'])->name('website.part');


// checkout
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');

// checkout
Route::get('/orderdetail', [App\Http\Controllers\CheckoutController::class, 'orderdetail'])->name('orderdetail');
