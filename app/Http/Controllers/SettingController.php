<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Session;

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
         return view('settings.couponlist');
    }


}
