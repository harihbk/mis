
<nav class="navbar navbar-expand-md sticky-top addShadow no-radius">
    <div class="container headnav">
    <a class="navbar-brand" href="{{ route('home')}}">
            <img class="header-logo" src="{{ asset('/images/logo.svg') }}" alt="bumaas">
        </a>
{{--
        <form action="{{ route('search') }}" class="form-group" method="post" id="form1">
            @csrf --}}





            <div class="input-group">


                <input class="typeahead form-control head-search-box" type="text"
                placeholder="Enter Product, part Number (English Only)" id="autocompletename">



{{--
<input type="hidden"
name="n_id" value="{{ request()->segment(3) ?? '' }}">

                    <input type="hidden"
                    name="childategory_id" value="{{ request()->route()->childategory_id ?? '' }}">

                    <input type="hidden"
                    name="prevurl" value="{{ Route::current()->getName() }}"> --}}


                <div class="input-group-btn header-search-wrap">
                    <input type="submit" class="btn btn-primary rounded-end" value="Search" form="form1">
                </div>
            </div>
            {{-- @if(Session::has('partno'))
            <div class="alert" style="color:red">No Part number found.Please Search another partnumber</div>
            @endif



        </form> --}}


        <ul class="navbar-nav d-flex align-items-center justify-content-end">
            <li class="nav-item">
                <div class="d-flex align-items-center">
                    <div>
                        <button type="button" class="btn btn-link btn-head-icon"><i class="fa fa-phone"
                                aria-hidden="true"></i></button>
                    </div>
                    <div class="header-phone-wrapper">
                        <div class="head-phone-title">Call Us Now:</div>
                        <div class="head-phone-number">
                            0(800) 123-456
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                @auth
                <form method="POST" action="{{ route('authlogout') }}">
                    @csrf
                    {{ auth()->user()->email }}
                    <button type="submit">Logout</button>
                  </form>
                @endauth
                @guest
                <a href="{{ route('login') }}">Login</a>
                @endguest


            </li>

            @auth
            <li class="nav-item">
               <a href="{{ route('website.profile')}}">
                <button type="button" class="btn btn-link btn-head-icon"><i class="fa fa-user-o"
                    aria-hidden="true"></i></button>
            </a>
            </li>
            @endauth

            <li class="nav-item">
                <a href="{{ route('wishlists')}}">
                <button type="button" class="btn btn-link btn-head-icon"><i class="fa fa-heart-o"
                        aria-hidden="true"></i></button>
                        <span class="whistlistcount-item">
                            <span class="whistlistcount badge badge-pill red"> 0 </span>
                        </span>
                </a>
            </li>
            <li class="nav-item">

            <span class="clearfix position-relative">
                <a href="{{ route('cartdata')}}">
                    <button type="button" class="btn btn-link btn-head-icon"><i class="fa fa-shopping-basket"
                        aria-hidden="true"></i></button>
                    <span class="basket-item-count position-absolute">
                        <span class="badge badge-pill badge-primary"> 0 </span>
                    </span>
                </a>

            </span>

            </li>
        </ul>
    </div>
</nav>


<!-- <nav style="--bs-breadcrumb-divider: '>';" class="breadcrumb-wrapper" aria-label="breadcrumb"> -->
<!-- <nav class="breadcrumb-wrapper" aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
        <li class="breadcrumb-item active">New customer registration</li>
    </ol>
</nav> -->
