<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product_part_number;
use Auth;

class WishlistController extends Controller
{


    public function addtowishlist(Request $request){
        $product_id = $request->input('product_id');


        $user = User::find(Auth::id());
        $product = Product_part_number::find($product_id);



        $user->wish($product);


         return "dsf";
    }

    public function countwhistlist(){
        if(Auth::id()){
            $user = User::find(Auth::id());
            $data = $user->countwishlist();


            $wishlist = $data;

        } else {
            $wishlist = 0;
        }
        return $wishlist;
    }


    public function wishlists(Request $request){
        if(Auth::id()){
            $user = User::find(Auth::id());
            $data = $user->wishlists();


           $wishlist = (isset($data['default'][0]) && $data['default'][0]) ? $data['default'][0] : [];
         //  if($data->isNotEmpty()) { $wishlist = $data['default']; } else { $wishlist = []; }
        } else {
            $wishlist = [];
        }


    return view('frontend.wishlist')->with(compact('wishlist'));
    }

    public function unwish(Request $request){

        $product_id = $request->input('product_id');
        $user = User::find(Auth::id());
        $product = Product_part_number::find($product_id);
        $user->unwish($product);
        $prod = $product->pluck('part_number')->first();
        $res['status'] = $prod ;
        return $res;
    }
}
