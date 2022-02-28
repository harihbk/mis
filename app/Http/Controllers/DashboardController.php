<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
class DashboardController extends Controller
{
    public function __construct()
    {



    }

    public function index(Request $request)
    {

        $data = Order::all();
        $customer = User::all();

       return view('dashboard.dashboard')->with(compact('data','customer'));
    }

}
