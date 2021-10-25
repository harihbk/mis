<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product_part_number;
use App\Models\Setting;

class CartController extends Controller
{
    public function __construct()
    {

    }

    public function addtocart(Request $request)
    {




         // prod_id  is a part number
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');





        // if(Cookie::get('shopping_cart'))
        // {
        //     $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        //     $cart_data = json_decode($cookie_data, true);
        // }
        // else
        // {
        //     $cart_data = array();
        // }

        $items = \Cart::getContent();
        if($items)
        {
          //  $cookie_data = stripslashes(Cookie::get('shopping_cart'));
           // $cart_data = json_decode($cookie_data, true);
           $cart_data = $items;
        }
        else
        {
            $cart_data = array();
        }



       $item_id_list = $cart_data->pluck('id')->toArray();


        $prod_id_is_there = $prod_id;

        if(in_array($prod_id_is_there, $item_id_list))
        {
            foreach($cart_data as $keys => $values)
            {

                 if($values->id == $prod_id)
                 {
                //     $cart_data[$keys]["item_quantity"] = $request->input('quantity');
                //     $item_data = json_encode($cart_data);
                //     $minutes = 3600;
                //     Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
                    // update the item on cart
                    \Cart::update($values->id,[
                        'relative' => false,
                        'quantity' => array(
                            'relative' => false,
                            'value' => $request->input('quantity'),
                        )

                    ]);


                     return response()->json(['status'=>'"'.$values->name.'" Already Added to Cart','status2'=>'2']);
                 }
            }

        }
        else
        {
            $products = Product_part_number::find($prod_id);

            $prod_name = $products->part_number;
            $prod_image = $products->icon;
            $priceval = $products->original_price;

            if($products)
            {
                $item_array = array(
                    'item_id' => $prod_id,
                    'item_name' => $prod_name,
                    'item_quantity' => $quantity,
                    'item_price' => $priceval,
                    'item_image' => $prod_image,
                    'product_length' => $products->product_length,
                    'product_quantity' => $products->quantity,
                    'weight_price' => $products->dash_price
                );
                $cart_data[] = $item_array;

                $item_data = json_encode($cart_data);
                $minutes = 3600;


                        // add the product to cart
                        \Cart::add(array(
                            'id' => $prod_id,
                            'name' => $prod_name,
                            'quantity' => $quantity,
                            'price' => $priceval,
                            'attributes' => array(),
                            'associatedModel' =>$products
                        ));



              //  Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));

                return response()->json(['status'=>'"'.$prod_name.'" Added to Cart']);
            }
        }
    }

    public function cartloadbyajax()
    {


        $items = \Cart::getContent();

        if(\Cart::isEmpty())
        {
            $totalcart = "0";
            echo json_encode(array('totalcart' => $totalcart,'cartdata'=>'')); die;
            return;
        }
        else
        {
            $totalcart = $items->count();
            echo json_encode(array('totalcart' => $totalcart,'cartdata'=>array())); die;
            return;
        }
    }

    public function cartdata()
    {
        // $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        // $cart_data = json_decode($cookie_data, true);

        $cart_data = \Cart::getContent();
        $settings = Setting::first();




        return view('frontend.cart')
            ->with(compact('cart_data','settings'))
        ;
    }

    public function clearcart()
    {

        \Cart::remove();
       // Cookie::queue(Cookie::forget('shopping_cart'));
        return response()->json(['status'=>'Your Cart is Cleared']);
    }


    public function updatetocart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $quantity = $request->input('quantity');


            // update the item on cart
            \Cart::update($prod_id,[
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity
                )
            ]);

           $cart =  \Cart::get($prod_id);

        return response()->json(['status'=>'"'.$cart->name.'" Quantity Updated']);




    }


    public function deletefromcart(Request $request)
    {
        $prod_id = $request->input('product_id');
        \Cart::remove($prod_id);
        return response()->json(['status'=>'Item Removed from Cart']);
    }

}
