<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use DB;

class FooterController extends Controller
{
    public function __construct()
    {



    }

    public function aboutus(){

        return view('frontend.aboutus');
    }

    public function airrivetingtool(){

        return view('frontend.airrivetingtool');
    }


    public function shippingypolicy(){

        return view('frontend.shippingypolicy');
    }


    public function refundscancellations(){

        return view('frontend.refundscancellations');
    }

    public function privacypolicy(){

        return view('frontend.privacypolicy');
    }


    public function termsandconditions(){

        return view('frontend.termsandconditions');
    }

    public function contactus(){

        return view('frontend.contactus');
    }
}
