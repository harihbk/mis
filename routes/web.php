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
Route::resource('roles', App\Http\Controllers\RoleController::class);
// Route::resource('users', App\Http\Controllers\UserController::class);

// promocode create
Route::post('promocode', [App\Http\Controllers\SettingController::class,'promocodesave'])->name('promocode');
Route::get('promocodelist', [App\Http\Controllers\SettingController::class,'promocodelist'])->name('promocodelist');
Route::get('getPromo', [App\Http\Controllers\SettingController::class,'p_list'])->name('promo.list');
Route::get('createcoupon', [App\Http\Controllers\SettingController::class,'createcoupon'])->name('createcoupon');

Route::get('settings', [App\Http\Controllers\SettingController::class,'index'])->name('settings');
Route::post('store', [App\Http\Controllers\SettingController::class,'store'])->name('setting.store');
Route::get('couponlist', [App\Http\Controllers\SettingController::class,'couponlist'])->name('couponlist');
Route::get('coupon', [App\Http\Controllers\SettingController::class,'couponlist'])->name('coupon');

// Route::resource('users', App\Http\Controllers\UserTypeController::class);
Route::resource('vendors', App\Http\Controllers\VendorController::class);
});


Route::group(['middleware' => ['auth']], function(){
    Route::get('dashboard', [App\Http\Controllers\UserController::class,'dashboard'])->name('dashboard');
    Route::get('customers', [App\Http\Controllers\UserController::class,'customer'])->name('customer');
    Route::get('customerlist', [App\Http\Controllers\UserController::class,'customerlist'])->name('customer.list');



});



Route::group(['middleware' => ['auth','role:Admin|Sub admin']], function(){
    Route::get('users/{type}',[App\Http\Controllers\UserController::class,'index']);
    Route::get('users/create/{type}',[App\Http\Controllers\UserController::class,'create']);
    Route::post('users/store/{type}',[App\Http\Controllers\UserController::class,'store']);
    Route::get('users/show/{type}/{val}',[App\Http\Controllers\UserController::class,'show']);
    Route::get('users/edit/{type}/{id}',[App\Http\Controllers\UserController::class,'edit']);
    Route::patch('users/update/{type}/{id}',[App\Http\Controllers\UserController::class,'update']);
    Route::delete('users/delete/{type}/{id}',[App\Http\Controllers\UserController::class,'destroy']);
});
Route::group(['middleware' => ['auth','role:Admin|vendor']], function(){



    Route::resource('dashboard', App\Http\Controllers\DashboardController::class);


    Route::resource('categorys', App\Http\Controllers\CategorysController::class);

    Route::resource('subcategories', App\Http\Controllers\SubcategoryController::class);

    Route::resource('parentcategories', App\Http\Controllers\ParentcategoryController::class);

    Route::resource('childcategories', App\Http\Controllers\ChildcategoryController::class);

    Route::resource('products', App\Http\Controllers\ProductController::class);

    Route::resource('productPartNumbers', App\Http\Controllers\Product_part_numberController::class);

    Route::resource('specifications', App\Http\Controllers\SpecificationController::class);

    Route::resource('specificationTypes', App\Http\Controllers\Specification_typeController::class);

    Route::post('getspecificationtype',[App\Http\Controllers\Specification_typeController::class, 'getspecificationtype'])->name('getspecificationtype');

    Route::get('order/{order_status_id?}', [App\Http\Controllers\OrderController::class,'index'])->name('order.index');
    Route::get('getOrders/{order_status_id?}',  [App\Http\Controllers\OrderController::class,'getOrders'])->name('order.list');
    Route::get('view/{order_id}',  [App\Http\Controllers\OrderController::class,'orderview'])->name('order.view');
    Route::post('confirmorder',  [App\Http\Controllers\OrderController::class,'confirmorder'])->name('confirm.order');
    Route::get('reqprofile',  [App\Http\Controllers\UserController::class,'reqprofile'])->name('reqprofile');
    Route::get('profileupdate/{id}',  [App\Http\Controllers\UserController::class,'profileupdate'])->name('profileupdate');
    Route::post('updateprofilebyid',[App\Http\Controllers\UserController::class,'updateprofilebyid'])->name('updateprofilebyid');



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
    Route::get('/viewprofile',[App\Http\Controllers\UserController::class, 'viewprofile'])->name('website.viewprofile');
    Route::get('/editprofile',[App\Http\Controllers\UserController::class, 'editprofile'])->name('website.editprofile');
    Route::post('/updatefrofile',[App\Http\Controllers\UserController::class, 'updatefrofile'])->name('website.updatefrofile');




});

Route::post('partno',[ App\Http\Controllers\Product_part_numberController::class,'partno'])->name('search');


//Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\VerificationController::class, 'verify']); // Make sure to keep this as your route name
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\VerificationController::class, 'verify'])->name('verification.verify'); // Make sure to keep this as your route name
Route::get('registermail', [App\Http\Controllers\VerificationController::class, 'registermail'])->name('registermail'); // Make sure to keep this as your route name


Route::get('adminlogin',[App\Http\Controllers\Auth\LoginController::class, 'adminlogin'])->name('adminlogin');
Route::get('/login/{type}/{email?}',[App\Http\Controllers\Auth\LoginController::class, 'LoginUserShow']);
Route::post('/login/{type}',[App\Http\Controllers\Auth\LoginController::class, 'LoginUser']);
Route::post('adminauth',[App\Http\Controllers\Auth\LoginController::class, 'adminauth'])->name('adminauth');


Route::post('emailcheck',[App\Http\Controllers\Auth\RegisterController::class, 'emailcheck'])->name('emailcheck');
Route::post('mobilecheck',[App\Http\Controllers\Auth\RegisterController::class, 'mobilecheck'])->name('mobilecheck');

Route::get('password/resets/{email}',[App\Http\Controllers\UserController::class, 'passwordResetEmail']);
Route::post('userpassword',[App\Http\Controllers\UserController::class, 'userpassword'])->name('userpassword');


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


//customer coupon code only if authenticated
Route::post('/couponstore', [App\Http\Controllers\CouponController::class, 'store'])->name('coupon.store');
Route::delete('/coupondestroy', [App\Http\Controllers\CouponController::class, 'destroy'])->name('coupon.destroy');

Route::post('payment',  [App\Http\Controllers\CheckoutController::class, 'payment'])->name('payment');

Route::get('/calculation', [App\Http\Controllers\CheckoutController::class, 'calculation'])->name('calculation');

Route::get('/success',[App\Http\Controllers\CheckoutController::class, 'success'])->name('success');

Route::get('/history',[App\Http\Controllers\OrderController::class, 'orderhistory'])->name('history');
Route::get('getuseOrders',  [App\Http\Controllers\OrderController::class,'getuserOrders'])->name('order.getuseOrders');
Route::get('userview/{order_id}',  [App\Http\Controllers\OrderController::class,'orderuserview'])->name('order.userview');

// autocomlete
Route::get('autocomplete',  [App\Http\Controllers\FrontendController::class,'orderuserview'])->name('orderuserview');


Route::resource('weights', App\Http\Controllers\WeightController::class);

Route::resource('units', App\Http\Controllers\UnitController::class);

Route::resource('pricings', App\Http\Controllers\PricingController::class);


//wishlist

Route::post('wishlist',[App\Http\Controllers\WishlistController::class,'addtowishlist'])->name('add-to-wishlist');
Route::get('wishlists',[App\Http\Controllers\WishlistController::class,'wishlists'])->name('wishlists');
Route::post('unwish',[App\Http\Controllers\WishlistController::class,'unwish'])->name('unwish');
Route::get('countwhistlist',[App\Http\Controllers\WishlistController::class,'countwhistlist'])->name('countwhistlist');





Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));

});

Breadcrumbs::register('subcat', function ($breadcrumbs,$subcat) {


    $breadcrumbs->parent('home');
    $breadcrumbs->push($subcat->name, route('website.parentcats',['subcat_id' => $subcat->id]));
});

Breadcrumbs::register('products', function ($breadcrumbs,$pc) {


    //this is calling below
    if(isset($pc->product) && $pc->product){


        $breadcrumbs->parent('subcat',$pc->product->childcategory->parentcategory->subcategory);
        $breadcrumbs->push($pc->product->name,  route('website.products',['childategory_id' => $pc->product->childcategory->id ]) );
    } else {

        if(isset($pc->parentcategory) && $pc->parentcategory){

            $breadcrumbs->parent('subcat',$pc->parentcategory->subcategory);
            $breadcrumbs->push($pc->name,  route('website.products',['childategory_id' => $pc->id]) );
        } else{
            //listparents
            $breadcrumbs->parent('subcat',$pc->subcategory);
            $breadcrumbs->push($pc->name, route('website.listparents',['childategory_id' => $pc->id]) );
        }
    }


});


Breadcrumbs::register('partnumber', function ($breadcrumbs,$partnumber) {



    $breadcrumbs->parent('products',$partnumber);
    $breadcrumbs->push($partnumber->part_number,'');
});








