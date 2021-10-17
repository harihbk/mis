<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_history;
use App\Models\Order_product;
use App\Models\Order_status;
use App\Models\Product_part_number;
use App\Models\Setting;
use App\Models\Oc_address;
use DataTables;
use View;
use Auth;

class OrderController extends Controller
{
    public function index(Request $request){

   return view('adminorder.orders');

    }


    public function getOrders(Request $request)
    {
        if ($request->ajax()) {

            if($request->key){
                $data = Order::latest()->where('order_status_id',$request->key)->groupby('id')->orderby('id', 'DESC')->get();
            } else {
                $data = Order::latest()->groupby('id')->orderby('id', 'DESC')->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('order_status_id', function($row){
                    $status = Order_status::where('order_status_id',$row->order_status_id)->first();
                    return  $status->name;
                })
                ->addColumn('billing_name', function($row){
                    return  $row->getCustomer->billing_name ?? '';
                })
                ->addColumn('billing_email', function($row){
                    return  $row->getCustomer->billing_email ?? '';
                })
                ->addColumn('billing_city', function($row){
                    return  $row->getCustomer->billing_city ?? '';
                })
                ->addColumn('billing_phone', function($row){
                    return  $row->getCustomer->billing_phone ?? '';
                })

                ->addColumn('action', function($row){

                    $route = route('order.view',$row->id);

                    $actionBtn = '<a href="'.$route.'" class="edit btn btn-success btn-sm">View</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }








    public function getuserOrders(Request $request)
    {
        $customer_id = auth()->user()->id;
        if ($request->ajax()) {
            $data = Order::where('user_id', $customer_id)->latest()->groupby('id')->orderby('id', 'DESC')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('order_status_id', function($row){
                    $status = Order_status::where('order_status_id',$row->order_status_id)->first();
                    return  $status->name;
                })
                ->addColumn('billing_name', function($row){
                    return  $row->getCustomer->billing_name ?? '';
                })
                ->addColumn('billing_email', function($row){
                    return  $row->getCustomer->billing_email ?? '';
                })
                ->addColumn('billing_city', function($row){
                    return  $row->getCustomer->billing_city ?? '';
                })
                ->addColumn('billing_phone', function($row){
                    return  $row->getCustomer->billing_phone ?? '';
                })

                ->addColumn('action', function($row){

                    $route = route('order.userview',$row->id);

                    $actionBtn = '<a href="'.$route.'" class="edit btn btn-success btn-sm">View</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }














    public function orderview(Request $request){

       $order_id = $request->order_id;   // order_id

       $order = Order::where('id', $order_id)->first();


       $orders = Order::where('id',$order_id)->first();
      // $order_product_first = Order::where('id',$order_id)->first();
       $order_product = Order_product::where('order_id',$order_id)->get();
       $status = Order_status::where('order_status_id',$orders->order_status_id)->first();
       $status = $status->name;


     if(isset($order->getCoupon->getcoupondata) && $order->getCoupon->getcoupondata){
         $discount = $order->getCoupon->getcoupondata;
     } else {
         $discount = 0;
     }


       $order_status = Order_status::all();

       $settings     = Setting::first();

       $oc_address = Oc_address::where('address_id',$orders->address_id )->first();
       $orderdetail =  View::make('orderdetail')->with(compact('order','order_product','status','settings','discount','oc_address'));

       $order_history = Order_history::where('order_id',$order_id)->get();



       $orderhistory =  View::make('adminorder.orderhistory')->with(compact('order_history'));

        return view('adminorder.vieworder')->with(compact('orderdetail','order_status','orderhistory','order_id'));

    }

    public function confirmorder(Request $request){

        $order_id = $request->only('order_id')['order_id'];
        $order_status_id = $request->only('order_status_id')['order_status_id'];

        $order_product = Order_product::where('order_id',$order_id)->get();

        // if order is cancelled quantity added to the Product_part_number
        if( $order_status_id == 3 ){
         foreach($order_product as $item){
                $product_id = $item->product_id;
                $quantity = $item->quantity;
                $partno = Product_part_number::where('id',$product_id)->increment('quantity',(int)$quantity);
         }
        }


        $status = Order_status::where('order_status_id',$order_status_id)->first();


        $order = Order::where('id', $order_id)->first();
        $order_product = Order_product::where('order_id',$order_id)->get();

        $status = $status->name;
        $settings     = Setting::first();


        if(isset($order->getCoupon->getcoupondata) && $order->getCoupon->getcoupondata){
            $discount = $order->getCoupon->getcoupondata;
        } else {
            $discount = 0;
        }

        $oc_address = Oc_address::where('address_id',$order->address_id )->first();
        $orderdetail =  View::make('orderdetail')->with(compact('order','order_product','status','settings','discount','oc_address'));



        $details = [
            'title' => 'Mail from BestindiaKart',
            'body' => "Your order is $status",
            'htmltemplate' => $orderdetail,

        ];

        $useremail =  $order->user->email;


        Order_history::create([
            'order_id' => $order_id,
            'order_status_id' => $order_status_id,
            'date_added'    => date('Y-m-d H:i:s')
        ]);

        //update order status
        $product = Order::find($order_id);
        $product->update(['order_status_id' => $order_status_id]);


        \Mail::to($useremail)->send(new \App\Mail\Ordermail($details));

        return redirect()->route('order.view', ['order_id' =>  $order_id ]);





    }

    public function orderhistory(){
        $customer_id = auth()->user()->id;
        $order_history = Order::where('user_id',$customer_id)->get();


        return view('frontend.profile')->with(compact('order_history'));

    }

    public function orderuserview(Request $request){
        $order_id = $request->order_id;   // order_id

        $order = Order::where('id', $order_id)->first();


        $orders = Order::where('id',$order_id)->first();
       // $order_product_first = Order::where('id',$order_id)->first();
        $order_product = Order_product::where('order_id',$order_id)->get();
        $status = Order_status::where('order_status_id',$orders->order_status_id)->first();
        $status = $status->name;


      if(isset($order->getCoupon->getcoupondata) && $order->getCoupon->getcoupondata){
          $discount = $order->getCoupon->getcoupondata;
      } else {
          $discount = 0;
      }


        $order_status = Order_status::all();

        $settings     = Setting::first();

        $oc_address = Oc_address::where('address_id',$orders->address_id )->first();
        $orderdetail =  View::make('orderdetail')->with(compact('order','order_product','status','settings','discount','oc_address'));

        $order_history = Order_history::where('order_id',$order_id)->get();


        $orderhistory =  View::make('adminorder.orderhistory')->with(compact('order_history'));

         return view('frontend.profiles.orderview')->with(compact('orderdetail','order_status','orderhistory','order_id'));
    }
}
