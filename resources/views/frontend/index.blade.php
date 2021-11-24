@extends('frontend.theme')

@section('content')
{{ Breadcrumbs::render('home') }}
<div class="container">

    @if (Session::has('message'))
    <div class="alert alert-dark">{{Session::get('message')}}</div>
    @endif

    @if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    <div class="row">
        <div class="col-md-3">
            <div class="nav-category-wrapper">
                <div class="nav-category-title">
                    <div>
                        All Categories
                    </div>
                    <i class="bi bi-list"></i>
                </div>
                <ul class="list-group my-3">
                    @include('frontend.loadcategory')
                </ul>
                <span class="ajax-load"></span>
                <div class="d-grid">
                    <button type="button" class="btn btn-primary more_product">More Products</button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="home-paginer">
                <div>
                    Due to current drastic freight increment, we may suspend to receiving orders for long profile
                    product
                </div>
                <div>
                    <button class="btn btn-latest-news">Latest News</button>
                </div>
            </div>
            <div class="banner-wrapper">
                <div class="slider-wrapper">
                    <!-- Set up your HTML -->
                    <div class="owl-carousel home-slider">
                        <div>
                            <img src="{{ URL::to('/') }}/images/banner/banner-1.jpg" alt="Banner">
                        </div>
                        <div>
                            <img src="{{ URL::to('/') }}/images/banner/banner-2.jpg" alt="Banner">
                        </div>
                        <div>
                            <img src="{{ URL::to('/') }}/images/banner/banner-3.jpg" alt="Banner">
                        </div>
                    </div>
                </div>
                <div class="banner-login-wrapper">
                    <h1>LOGIN</h1>
                    @if (Session::has('message'))
                    <div class="alert alert-warning">{{Session::get('message')}}</div>
                    @endif
                    <form action="{{ url('authlogin') }}" id="loginfrm" name="loginfrm" method="post" target="_top">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group login-input-wrapper">
                                        <div class="input-group-addon login-input-icon-wrapper">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        </div>
                                        <input id="txtemail" type="text" placeholder="Input your user ID or Email"
                                            name="email" class="login-input form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group login-input-wrapper">
                                        <div class="input-group-addon login-input-icon-wrapper">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                        </div>
                                        <input id="pwd" type="password" placeholder="Input your password"
                                            name="password" class="login-input form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block">
                            <button type="submit" id="login_btn" class="btn btn-primary btn-login">
                                <span class="bi bi-box-arrow-right"></span> LOG IN
                            </button>
                        </div>
                    </form>


                    <div class="d-block">
                        <a class="login-forgot" href="{{ route('password.request') }}">Forgot password</a>
                    </div>
                    <div class="customer-service-wrapper">
                        <h3>Customer Service</h3>
                        <a class="btn customer-service-btn" href="{{ route('register') }}">New Register</a>
                        <a class="btn customer-service-btn" href="request-catalogs.php">Catalog Request</a>
                        <div class="customer-service-subtitle">Best Indiakart Contact</div>
                        <div>9:00AM - 5:30PM</div>
                        <div>Monday to Saturday</div>
                        <a class="customer-service-mail" href="mailto:info@bestindiakart.com">info@bestindiakart.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.home.our_channel')

    @include('frontend.home.fastner')

    @include('frontend.home.resttools')

</div>

<script>
    $(".alert-dark").fadeTo(2000, 500).slideUp(1000, function(){
    $(".alert-dark").slideUp(1000);
});
</script>


@endsection
