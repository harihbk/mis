<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_history;
use App\Models\Order_product;
use App\Models\Order_status;
use App\Models\Product_part_number;
use DataTables;
use View;

class OrderController extends Controller
{
    public function index(Request $request){

   return view('adminorder.orders');

    }


    public function getOrders(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::latest()->groupby('id')->orderby('id', 'DESC')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('order_status_id', function($row){
                    $status = Order_status::where('order_status_id',$row->order_status_id)->first();
                    return  $status->name;
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


    public function orderview(Request $request){

       $order_id = $request->order_id;   // order_id

       $order = Order::where('id', $order_id)->first();


       $orders = Order::where('id',$order_id)->first();
      // $order_product_first = Order::where('id',$order_id)->first();
       $order_product = Order_product::where('order_id',$order_id)->get();
       $status = Order_status::where('order_status_id',$orders->order_status_id)->first();
       $status = $status->name;


       $order_status = Order_status::all();



       $orderdetail =  View::make('orderdetail')->with(compact('order','order_product','status'));

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

        $orderdetail =  View::make('orderdetail')->with(compact('order','order_product','status'));

        $details = [
            'title' => 'Mail from BestindiaKart',
            'body' => "Your order is $status",
            'htmltemplate' => $orderdetail
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
}
