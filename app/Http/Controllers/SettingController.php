<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Session;
use Promocodes;
class SettingController extends Controller
{

    public function index(){

        $data = Setting::first();

        return view('settings.form')->with(compact('data'));
    }

    public function store(Request $request){
        $data = Setting::all();
        if($data->isEmpty()){
            Setting::create($request->only('discount_status','discount','igst','cgst','sgst'));
        } else {
            Setting::where('id',$data[0]->id)->update($request->only('discount_status','discount','igst','cgst','sgst'));

        }
        Session::flash('successMsg','Settings Updated');

        return redirect()->route('settings')->with('successMsg','Settings Updated');

    }

    public function couponlist(Request $request){
       // $promo = Promocodes::create($amount = 2, $reward = 10,  $data = [], $expires_in = 1, $quantity = null, $is_disposable = true);
    //    $promo = Promocodes::apply('UM3E-BYL9');
    //      print_r($promo);
    //      exit();
    $promocode = Promocodes::all();

    return view('settings.couponlistdata')->with(compact('promocode'));
      //
    }

    public function promocodesave(Request $request){
        //$request->only('amount','reward','expires_in','quantity');
        $amount =  $request->post('amount');
        $reward =  $request->post('reward');
        $expires_in =  $request->post('expires_in');
        $quantity =  $request->post('quantity');
        Promocodes::create($amount, $reward ,  $data = [], $expires_in , $quantity , $is_disposable = false);
        return redirect()->route('couponlist');
    }

    public function createcoupon(Request $request){
        return view('settings.couponlist');
    }


    public function p_list(Request $request){

        if ($request->ajax()) {
            $data =Promocodes::latest();

            return Datatables::of($data)
                ->addIndexColumn()

                ->rawColumns(['action'])
                ->make(true);
        }
    }


}
