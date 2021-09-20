<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Http\Requests\CheckoutRequest;
// use Cart;

// use App\OrderProduct;
// use Cartalyst\Stripe\Stripe;
// use Mail;
// use App\Mail\OrderPlaced;
// use App\Product;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\CheckoutRequest;
use App\Models\Product_part_number;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Order_history;
use App\Models\Setting;
use Auth;
use View;


class CheckoutController extends Controller
{


    public function index()
    {

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        if(Auth::id()){
            $exist_address = Order::where('user_id',Auth::id())->get();
        } else {
            $exist_address = "";
        }

        $settings = Setting::first();

        return view('frontend.checkout')
            ->with(compact('exist_address','cart_data' , 'settings'));

        // if (Cart::instance('default')->count() > 0) {
        //     $subtotal = Cart::instance('default')->subtotal() ?? 0;
        //     $discount = session('coupon')['discount'] ?? 0;
        //     $newSubtotal = $subtotal - $discount > 0 ? $subtotal - $discount : 0;
        //     $tax = $newSubtotal * (config('cart.tax') / 100);
        //     $total = $tax + $newSubtotal;
        //     return view('checkout')->with([
        //         'subtotal' => $subtotal,
        //         'discount' => $discount,
        //         'newSubtotal' => $newSubtotal,
        //         'total' => $total,
        //         'tax' => $tax
        //     ]);
        // }
       // return redirect()->route('cart.index')->withError('You have nothing in your cart , please add some products first');
    }

    public function orderdetail(){

        $order = Order::where('id', 1)->first();
        $order_product = Order_product::where('order_id',1)->get();

        echo View::make('orderdetail')->with(compact('order','order_product'));
        //return view('orderdetail');
    }

    public function store(CheckoutRequest $request)
    {

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        if(empty($cart_data)){

            return  back()->with('error','Sorry, one of the items on your cart is no longer available');
        }

        if ($this->productsAreNoLongerAvailable()) {
            return back()->with('error','Sorry, one of the items on your cart is no longer available');
        }

        // $contents = Cart::instance('default')->content()->map(function ($item) {
        //     return $item->model->slug . ', ' . $item->qty;
        // })->values()->toJson();

        try {
            // $stripe = Stripe::make('api_key');
            // $charge = $stripe->charges()->create([
            //     'amount' => Cart::instance('default')->total(),
            //     'currency' => 'USD',
            //     'source' => $request->stripeToken,
            //     'description' => 'Order',
            //     'receipt_email' => $request->email,
            //     'metadata' => [
            //         'contents' => $contents,
            //         'quantity' => Cart::instance('default')->count(),
            //         'discount' => session()->has('coupon') ? collect(session('coupon')->toJson) : null,
            //     ],
            // ]);

            $order = $this->insertIntoOrdersTable($request, null);

            $order = Order::where('id', $order->id)->first();
            $order_product = Order_product::where('order_id',$order->id)->get();
            $status = "Pending";
            $settings     = Setting::first();
            $orderdetail =  View::make('orderdetail')->with(compact('order','order_product','status' , 'settings' ));



            // SUCCESSFUL

            // store history of customer
            Order_history::create([
                'order_id' => $order->id,
                'order_status_id' => 1
            ]);

            $this->decreaseQuantities();



            $details = [
                'title' => 'Mail from BestindiaKart',
                'body' => 'Your order placed Successfully.if you have any queries just contact with admin',
                'htmltemplate' => $orderdetail
            ];



            $useremail = auth()->user()->email;
            \Mail::to($useremail)->send(new \App\Mail\Ordermail($details));


            // clear cart
            Cookie::queue(Cookie::forget('shopping_cart'));



           // session()->forget('coupon');
         //   return redirect()->route('website')->with('success', 'Your order is completed successfully!');

          return view('frontend.confirmorder');

        } catch (Exception $e) {
            $this->insertIntoOrdersTable($request, $e->getMessage());
            return back()->withError('Error ' . $e->getMessage());
        }
    }

    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $code = session()->get('coupon')['code'] ?? null;
        $newSubtotal = Cart::instance('default')->subtotal() - $discount;
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal + $newTax;
        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'code' => $code,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal
        ]);
    }

    private function insertIntoOrdersTable($request, $error)
    {
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $total = 0;
        foreach($cart_data as $item){
            $total = $total + ($item["item_quantity"] * $item["item_price"]);

        }

        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postal_code,
            'billing_phone' => $request->phone,
            'billing_name_on_card' => 'test',
            'billing_discount' => 0,
            'billing_discount_code' =>0,
            'billing_subtotal' =>$total,
            'billing_tax' => 0,
            'billing_total' =>$total,
            'order_status_id' => 1, //pending status
            'error' => $error
        ]);

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        foreach($cart_data as $item){

            Order_product::create([
                'product_id' => $item['item_id'],
                'order_id' => $order->id,
                'quantity' => $item['item_quantity']
            ]);

        }


        return $order;
    }

    private function decreaseQuantities()
    {

        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);



        foreach($cart_data as $item){
            $product = Product_part_number::find($item['item_id']);
            $product->update(['quantity' => (int)$product->quantity - (int)$item['item_quantity']]);

        }

    }

    private function productsAreNoLongerAvailable()
    {


        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
         if(empty($cart_data)){
            return false;
         }
        $totalcart = count($cart_data);
        if($totalcart > 0){

            foreach($cart_data as $item){
                $product = Product_part_number::find($item['item_id']);
                if ($product->quantity < $item['item_quantity']) {
                    return true;
                }
            }
            return false;
        }
        return false;


    }
}
