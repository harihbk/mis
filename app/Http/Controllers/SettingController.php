<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Session;
use Promocodes;
use Carbon\Carbon;
use Redirect;

use Gabievi\Promocodes\Models\Promocode;

//use App\Models\Promocodes;
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


    public function getExpiresIn($request)
    {
        return $request !== null ? $request : $this->expires_in;
    }

    public function promocodesave(Request $request){
        //$request->only('amount','reward','expires_in','quantity');
        $expires_ins = $request->post('expires_in');

        $amount =  $request->post('amount');
        $reward =  $request->post('reward');
        $expires_in = Carbon::now()->addDays($expires_ins) ;
        $quantity =  $request->post('quantity');
        $code = $request->post('code');

        if(Promocodes::check($code)){

            return Redirect::back()->with(['warning' => 'Your Promocode already exist']);

        }



        Promocode::create(
            ['amount' => $amount,
            'reward' => $reward ,
            'data' => [],
             'expires_at' => $expires_in ,
             'quantity' => $quantity ,
             'is_disposable' => false,
             'code' => $code
             ]
            );
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
