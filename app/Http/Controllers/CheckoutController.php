<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
// use App\Http\Requests\CheckoutRequest;
// use Cart;

// use App\OrderProduct;
// use Cartalyst\Stripe\Stripe;
// use Mail;
// use App\Mail\OrderPlaced;
// use App\Product;
use Illuminate\Support\Facades\Crypt;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\CheckoutRequest;
use App\Models\Product_part_number;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Order_history;
use App\Models\Setting;
use App\Models\Oc_address;
use App\Models\Pricing;
use Auth;
use View;
use Session;
use Promocodes;

class CheckoutController extends Controller
{


    public function index()
    {

        // $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        // $cart_data = json_decode($cookie_data, true);
        $cart_data = \Cart::getContent();
        if(Auth::id()){
            $exist_address = Oc_address::where('customer_id',Auth::id())->get();
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
        $oc_address = Oc_address::where('address_id',$order->address_id)->first();
        echo View::make('orderdetail')->with(compact('order','order_product','oc_address'));
        //return view('orderdetail');
    }

    public function store(Request $request)
    {



        if($request->radio_address == "_new"){
        $emailValidation = auth()->user() ? 'required|email' : 'required|email|unique:users';

        $request->validate([
            'email' => $emailValidation,
            'name' => 'required|max:255|min:3',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'phone' => 'required'
        ]);
    }


        // $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        // $cart_data = json_decode($cookie_data, true);

        $items = \Cart::getContent();
        if(\Cart::isEmpty()){
            echo json_encode('Sorry, one of the items on your cart is no longer available');
           // return  back()->with('error','Sorry, one of the items on your cart is no longer available');
        }

        if ($this->productsAreNoLongerAvailable()) {
            echo json_encode('Sorry, one of the items on your cart is no longer available');
          //  return back()->with('error','Sorry, one of the items on your cart is no longer available');
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
            $oc_address = Oc_address::where('address_id',$order->address_id)->first();

            $orderdetail =  View::make('orderdetail')->with(compact('order','order_product','status' , 'settings' , 'oc_address' ));



            // SUCCESSFUL

            // store history of customer
            Order_history::create([
                'order_id' => $order->id,
                'order_status_id' => 1
            ]);

           $calc =  $this->calculation($order->id);

            $this->decreaseQuantities();


            $product = Order::find($order->id);
            $product->update(['total_price' => $calc]);


            $details = [
                'title' => 'Mail from BestindiaKart',
                'body' => 'Your order placed Successfully.if you have any queries just contact with admin',
                'htmltemplate' => $orderdetail
            ];



            $useremail = auth()->user()->email;
            \Mail::to($useremail)->send(new \App\Mail\Ordermail($details));


            // clear cart
         //   Cookie::queue(Cookie::forget('shopping_cart'));
       //  $order_id= Crypt::encrypt($order->id);
            $successdata = [
                'status' =>200,
                'order_id' =>  $order->id,
                'total'    => $calc
            ];
            session()->put('order_id',$order->id);
         echo json_encode($successdata);

           // session()->forget('coupon');
         //   return redirect()->route('website')->with('success', 'Your order is completed successfully!');

      //    return view('frontend.confirmorder');

        } catch (Exception $e) {
            $this->insertIntoOrdersTable($request, $e->getMessage());
            echo json_encode('fail');
           // return back()->withError('Error ' . $e->getMessage());
        }
    }

    public function success(){

        return view('frontend.confirmorder');
    }

    public function calculation($order_id){

        $total=0;
        $weight = 0 ;
        $discount = 0;

         $items = \Cart::getContent();
            foreach ($items as $item){
                if($item->associatedModel->unit->description == "gm"){
                    $weight += ($item->associatedModel->weight->name * $item->associatedModel->product_weight *  $item->quantity) /1000;
                } else {
                    $weight += $item->associatedModel->weight->name * $item->associatedModel->product_weight *  $item->quantity;
                }
                $total = $total + ($item->quantity * $item->price * $item->associatedModel->weight->name);


            }


            if(session('coupon')){
                // $co =  Promocodes::apply(session('coupon')['name']);

                $orders = Order::where('id', $order_id)->first();
                $promocode = $orders->Promocodes->reward;
                $coupon_amount = $orders->Promocodes->reward;
                $orders->coupon_amount = $coupon_amount;
                $orders->save();


               // $promocode = $co->users[0]->pivot->id;
              } else {
                 $promocode = 0;
              }
              $subtotal = $total - $promocode;

        $settings = Setting::first();
            if (isset($settings) && $settings->igst){
                $igst =   ($subtotal *  $settings->igst) / 100 ;
            } else {
                $igst = 0;
            }

            if (isset($settings) && $settings->cgst){
                $cgst =   ($subtotal *  $settings->cgst) / 100 ;
            } else {
                $cgst = 0;
            }
        $shipping_price = $this->getAmount($weight);
        $grand_total =   $subtotal + $igst + $cgst + $shipping_price;




 return  $grand_total ;
 //return  $grand_total-$promocode;
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
        // $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        // $cart_data = json_decode($cookie_data, true);
        // $total = 0;
        // $weight_price = 0;
        // foreach($cart_data as $item){
        //     $weight_price +=$item['weight_price']*$item['item_quantity'];
        //     $total = $total + ($item["item_quantity"] * $item["item_price"]);

        // }
            $total=0;
            $weight = 0 ;
            $discount = 0;

             $items = \Cart::getContent();
                foreach ($items as $item){
                    if($item->associatedModel->unit->description == "gm"){
                        $weight += ($item->associatedModel->weight->name * $item->associatedModel->product_weight *  $item->quantity) /1000;
                    } else {
                        $weight += $item->associatedModel->weight->name * $item->associatedModel->product_weight *  $item->quantity;
                    }
                    $total = $total + ($item->quantity * $item->price * $item->associatedModel->weight->name);
                }


            $subtotal = abs($discount-$total);
            $settings = Setting::first();
                if (isset($settings) && $settings->igst){
                    $igst =   ($total *  $settings->igst) / 100 ;
                } else {
                    $igst = 0;
                }

                if (isset($settings) && $settings->cgst){
                    $cgst =   ($total *  $settings->cgst) / 100 ;
                } else {
                    $cgst = 0;
                }


            $shipping_price = $this->getAmount($weight);

            $grand_total =   $total + $igst + $cgst + $shipping_price;


                    if(session('coupon')){
                    $co =  Promocodes::apply(session('coupon')['name']);

                   // $promocode = $co->users[0]->pivot->id;
                    $promocode = $co->id;
                    } else {
                        $promocode = 0;
                    }


        if($request->radio_address == "exist"){

         $address_id =   $request->existaddress;

        } else {
        // new address
            $address = Oc_address::create([
                'customer_id' =>  auth()->user() ? auth()->user()->id : null,
                'billing_email' => $request->email,
                'billing_name' => $request->name,
                'billing_address' => $request->address,
                'billing_city' => $request->city,
                'billing_province' => $request->province,
                'billing_postalcode' => $request->postal_code,
                'billing_phone' => $request->phone,
                ]);
        $address_id = $address->id;

        // new address
        }


        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_name_on_card' => 'test',
            'billing_discount' => 0,
            'billing_discount_code' =>0,
            'billing_subtotal' =>$total,
            'billing_tax' => 0,
            'billing_total' =>$total,
            'coupon_id' => $promocode,  // promocode id   from promocode user
            'order_status_id' => 1, //pending status
            'error' => $error,
            'address_id' =>  $address_id,
            'shipping_price' => 0,
            'total' => $total,
            'subtotal' =>$subtotal ,
            'igst' =>$igst,
            'cgst' => $cgst,
            'shippingcharge' => $shipping_price,
            'coupon_amount' => 0,
            'grand_total' =>$grand_total
        ]);




        // $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        // $cart_data = json_decode($cookie_data, true);
        foreach($items as $item){

            Order_product::create([
                'product_id' => $item->id,
                'order_id' => $order->id,
                'quantity' => $item->quantity
            ]);

        }


        return $order;
    }

    private function decreaseQuantities()
    {

        // $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        // $cart_data = json_decode($cookie_data, true);
        $items = \Cart::getContent();


        foreach($items as $item){
            $product = Product_part_number::find($item->id);
            $product->update(['quantity' => (int)$product->quantity - (int)$item->quantity]);

        }

    }

    private function productsAreNoLongerAvailable()
    {

        $items = \Cart::getContent();

        // $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        // $cart_data = json_decode($cookie_data, true);
         if(\Cart::isEmpty()){
            return false;
         }
        $totalcart = $items->count();
        if($totalcart > 0){

            foreach($items as $item){
                $product = Product_part_number::find($item->id);
                if ($product->quantity < $item->quantity) {
                    return true;
                }
            }
            return false;
        }
        return false;


    }


    public function payment(Request $request)
    {
        $input = $request->all();



        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id']))
        {
            try
            {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));


                $razorpay_id = $response->id;
                $amount = $response->amount/100;
                $created_at = $response->created_at;
                $entity = $response->entity;
                $order_id = Session::get('order_id');

                $user = Order::find($order_id);
                $user->razorpay_id = $razorpay_id;
                $user->razorpay_created_at = $created_at;
                $user->save();


            }
            catch (\Exception $e)
            {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        echo json_encode(true);
      //  return redirect()->back();
    }

    public static function getAmount($weight){
        $first = Pricing::where('slug','below-10-kg')->pluck('name')->first();
        $second = Pricing::where('slug','above-10-kg')->pluck('name')->first();
            if($weight <= 10){
               return $first;
            } else {
               $w =  abs(ceil($weight) - 10) * $second;
              return  $first +  $w;
            }

    }
}
