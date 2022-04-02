@extends('layouts.app')

@section('content')

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>

            </div>
        </div>
    </section>

    <div class="content px-3">


        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> {{ count($data->where('order_status_id',1)) }} </h3>
                        <p> Pending</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('order.index',1)}}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3> {{ count($data->where('order_status_id',2)) }} </h3>
                        <p> Order Confirm </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('order.index',2)}}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <h3> {{ count($data->where('order_status_id',3)) }} </h3>
                        <p>Order Cancel </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('order.index',3)}}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                        <h3> {{ count($data->where('order_status_id',4)) }} </h3>
                        <p> Order Shipped </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="{{ route('order.index',4)}}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>





        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> {{ count($customer->where('status',1)) }} </h3>
                        <p> Total customer</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('customer') }}" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> {{ $data->where('order_status_id',3)->sum('total_price') }} </h3>
                        <p> Total Amount</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                    {{-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> --}}
                </div>
            </div>
        </div>


        <div class="row">

    <!-- Tabs navs -->
    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
        <a
            class="nav-link {{ ( request()->route()->view  == 'week' ? 'active' : ( request()->route()->view  ? '' : 'active') )}}"
            id="ex1-tab-1"
            data-mdb-toggle="tab"
            href="{{ route('dashboardreport','week') }}"
            role="tab"
            aria-controls="ex1-tabs-1"
            aria-selected="true"
            >Week</a
        >
        </li>
        <li class="nav-item" role="presentation">
        <a
            class="nav-link {{ request()->route()->view  == 'month' ? 'active' : ''}}"
            id="ex1-tab-2"
            data-mdb-toggle="tab"
            href="{{ route('dashboardreport','month') }}"
            role="tab"
            aria-controls="ex1-tabs-2"
            aria-selected="false"
            >Month</a
        >
        </li>
        <li class="nav-item" role="presentation">
        <a
            class="nav-link {{ request()->route()->view  == 'year' ? 'active' : ''}}"
            id="ex1-tab-3"
            data-mdb-toggle="tab"
            href="{{ route('dashboardreport','year') }}"
            role="tab"
            aria-controls="ex1-tabs-3"
            aria-selected="false"
            >Year</a
        >
        </li>
    </ul>
    <!-- Tabs navs -->

  <!-- Tabs content -->
            <div class="tab-content" id="ex1-content">
                <div
                class="tab-pane fade show active"
                id="ex1-tabs-1"
                role="tabpanel"
                aria-labelledby="ex1-tab-1"
                >
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>
                <div class="tab-pane fade " id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">

                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>
                <div class="tab-pane fade " id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                </div>
            </div>
        </div>

</div>


<script>
    window.onload = function () {

        var datapoint = JSON.parse('<?=$records?>') ;
        console.log(datapoint);


    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Sales Charts"
        },
        data: [{
            type: "line",
              indexLabelFontSize: 16,

              dataPoints: datapoint

            // dataPoints: [
            //     { y: 450 },
            //     { y: 414},
            //     { y: 520, indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" },
            //     { y: 460 },
            //     { y: 450 },
            //     { y: 500 },
            //     { y: 480 },
            //     { y: 480 },
            //     { y: 410 , indexLabel: "\u2193 lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
            //     { y: 500 },
            //     { y: 480 },
            //     { y: 510 }
            // ]
        }]
    });
    chart.render();

    }
    </script>


    @endsection
