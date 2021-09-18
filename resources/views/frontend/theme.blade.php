
@include('frontend.header')

<!--
    <span class="clearfix">
        <a href="{{ route('cartdata') }}">Cart</a>
        <span class="basket-item-count">
            <span class="badge badge-pill red"> 0 </span>
        </span>
    </span> -->


    {{-- <div class="container-fluid"> --}}

        @yield('content')
    {{-- </div> --}}




@include('frontend.footer')

