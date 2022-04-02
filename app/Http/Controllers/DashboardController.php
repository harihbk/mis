<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {



    }

    public function index(Request $request)
    {
        $now = Carbon::now();

        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
        $datas = Order::select(
            DB::raw('sum(total_price) as sums'),
            DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
            DB::raw("DATE_FORMAT(created_at,'%m') as monthKey"),
            DB::raw('DATE(created_at) as date'),'created_at'
        )->whereBetween('created_at', [$weekStartDate, $weekEndDate])
        ->where('order_status_id',3)
        ->groupBy('date')
        ->orderBy('created_at', 'ASC')
        ->get();
        $records = [];
        foreach($datas as $k=>$v){
            $arr = [
                'label' => Carbon::parse($v->created_at)->format('M d Y'),
                'y' => $v->sums
            ];
            $records[] =  $arr;

        }
        $records = json_encode($records);

        $data = Order::all();
        $customer = User::all();

       return view('dashboard.dashboard')->with(compact('data','customer','records'));
    }

    public function reportdashboard(Request $request,$params){

        $now = Carbon::now();

        switch ($params){
            case 'week':
                $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
                $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
                $datas = Order::select(
                    DB::raw('sum(total_price) as sums'),
                    DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
                    DB::raw("DATE_FORMAT(created_at,'%m') as monthKey"),
                    DB::raw('DATE(created_at) as date'),'created_at'
                )->whereBetween('created_at', [$weekStartDate, $weekEndDate])
                ->where('order_status_id',3)
                ->groupBy('date')
                ->orderBy('created_at', 'ASC')
                ->get();
                $records = [];
                foreach($datas as $k=>$v){
                    $arr = [
                        'label' => Carbon::parse($v->created_at)->format('M d Y'),
                        'y' => $v->sums
                    ];
                    $records[] =  $arr;

                }
                $records = json_encode($records);

                break;

            case 'month':
                $datas = Order::select(
                    DB::raw('sum(total_price) as sums'),
                    DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
                    DB::raw("DATE_FORMAT(created_at,'%m') as monthKey"),
                    DB::raw("DATE_FORMAT(created_at,'%d-%m-%y') as dates"),
                    'created_at'
          )
          ->where('order_status_id',3)
          ->groupBy('months', 'monthKey')
          ->orderBy('created_at', 'ASC')
          ->get();

          $records = [];


          foreach($datas as $k=>$v){
              $arr = [
                  'label' => Carbon::parse($v->created_at)->format('M d Y'),
                  'y' => $v->sums
              ];
              $records[] =  $arr;

          }
                $records = json_encode($records);
                break;
            case 'year':

                $datas = Order::select(
                    DB::raw('sum(total_price) as sums'),
                    DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
                    DB::raw("DATE_FORMAT(created_at,'%m') as monthKey"),
                    DB::raw("DATE_FORMAT(created_at,'%d-%m-%y') as dates"),
                    'created_at'
          )->whereYear('created_at', date('Y'))
                ->where('order_status_id',3)
                ->get();
                $records = [];
                foreach($datas as $k=>$v){
                    $arr = [
                        'label' => Carbon::parse($v->created_at)->format('M d Y'),
                        'y' => $v->sums
                    ];
                    $records[] =  $arr;

                }
                      $records = json_encode($records);

                break;
        }

        $data = Order::all();
        $customer = User::all();





        return view('dashboard.dashboard')->with(compact('data','customer','records'));

     //   echo $now->year;
      //  echo $now->month;


    //  echo "<pre>";
    //  print_r($data);
    //  exit();
    }

}
