<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Promocodes;




class CouponController extends Controller
{
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Promocodes::check($request->post('coupon_code'));

        if (!$coupon) {
            return back()->withErrors('Invalid coupon code. Please try again.');
        }


      //  Promocodes::apply($request->post('coupon_code'));

        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' =>$coupon->reward,
            'id'      =>$coupon->id
        ]);

        return back()->with('success_message', 'Coupon has been applied!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return back()->with('success_message', 'Coupon has been removed.');
    }
}
