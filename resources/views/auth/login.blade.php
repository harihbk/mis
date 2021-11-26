<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>


    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('/') }}images/favicon.ico">
    <link href="{{ asset('/bootstrap/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/bootstrap/bootstrap-icons.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/bootstrap.min.js') }}"></script>
    <script language="javascript">
        function validate() {
        var email = document.getElementById("txtemail").value;
        var password = document.getElementById("pwd").value;
        if (email == '') {
            alert("Enter the Email Id");
            document.getElementById("txtemail").focus();
            return false;
        }
        if (password == '') {
            alert("Enter the Password");
            document.getElementById("pwd").focus();
            return false;
        }
        document.loginfrm.submit();
    }

    function validate1() {
        var email = document.getElementById("email").value;
        if (email == '') {
            alert("Enter the Email Id");
            document.getElementById("email").focus();
            return false;
        }
        document.forgetfrm.submit();
    }
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-md sticky-top addShadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="header-logo" src="./images/logo.svg" alt="bumaas">
            </a>
            <form class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control head-search-box"
                        placeholder="Enter Product, part Number (English Only)">
                    <div class="input-group-btn">
                        <button class="btn btn-primary rounded-0 rounded-end" type="submit">
                            Search
                        </button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav d-flex align-items-center">
                <li class="nav-item">
                    <div class="d-flex align-items-center">
                        <div>
                            <button type="button" class="btn btn-link btn-head-icon"><i
                                    class="bi bi-telephone"></i></button>
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
                    <button type="button" class="btn btn-link btn-head-icon"><i class="bi bi-person"></i></button>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-link btn-head-icon"><i class="bi bi-heart"></i></button>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-link btn-head-icon"><i class="bi bi-bag"></i></button>
                </li>
            </ul>
        </div>
    </nav>
    <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Library</li>
    </ol>
    <form action="{{ url('authlogin') }}" id="loginfrm" name="loginfrm" method="post" target="_top">
        @csrf
        <div class="login-wrapper">
            <div class="card login-card">
                <div class="card-body px-5  ">
                    <h1 class="text-center login-title mt-3 mb-4">Login</h1>
                    @if (Session::has('message'))
                    <div class="alert alert-danger">{{Session::get('message')}}</div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group login-input-wrapper">
                                    <div class="input-group-addon login-input-icon-wrapper">
                                        <span class="bi bi-envelope login-input-icon"></span>
                                    </div>
                                    <input required id="txtemail" type="email" placeholder="Input your user ID or Email"
                                        name="email" class="login-input form-control">
                                    @error('email')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group login-input-wrapper">
                                    <div class="input-group-addon login-input-icon-wrapper">
                                        <span class="bi bi-key login-input-icon"></span>
                                    </div>
                                    <input required id="pwd" type="password" placeholder="Input your password"
                                        name="password" class="login-input form-control">
                                    @error('password')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-end">

                            <p class="mb-1">
                                <a href="{{ route('password.request') }}">Forgot password</a>
                            </p>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">

                            <button type="submit" id="login_btn" class="btn btn-primary btn-login">
                                <span class="bi bi-box-arrow-right"></span> LOG IN
                            </button>
                            <p class="mb-0 mt-3">
                                <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        {{--
        <div style="display:none;" class="popup" id="forgotpas">
            <div id="forgotpas-ct">
                <div class="popup-header">
                    <h2>Forgot Password?</h2>
                    <a class="modal_close" href="#"></a>
                </div>

                <form action="login.php" id="forgetfrm" name="forgetfrm" method="post" target="_top"
                    onSubmit="return validate1();">

                    <div class="txt-fld">
                        <input name="email" type="text" id="email" placeholder="Email Id" value="" />
                    </div>
                    <div class="btn-fld">
                        <button class="sub_but comfloatr" type="submit" name="forgot_password">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </form> --}}

    <!-- <div class="login_footer">
        <div class="login_fcoll">HARI 2021. All Rights Reserved</div>
        <div class="login_fcolr"><a href="#">Privacy</a>|<a href="#">Terms of Use</a></div>
    </div> -->

</body>

</html>





























{{--


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>misumi</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
        integrity="sha512-0S+nbAYis87iX26mmj/+fWt1MmaKCv80H+Mbo+Ne7ES4I6rxswpfnC6PxmLiw33Ywj2ghbtTw0FkLbMWqh4F7Q=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css"
        integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
        integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
        crossorigin="anonymous" />


    <link href="{{ asset('css/logincustom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlogin.css') }}" rel="stylesheet">


</head>

<body class="fix-header">

    <div class="login-logo">
    </div>



    <div class="login-container">
        <div class="login-logo">
            <img src="{{ asset('/images/best-india-kart-white.png') }}" alt="logo" />
        </div>
        <div>

            @if (Session::has('message'))
            <div class="alert alert-error">{{Session::get('message')}}</div>
            @endif

            <form action="{{ url('authlogin') }}" class="form-horizontal form-material" id="loginform" method="post">
                @csrf
                <p class="login-title">Login into your account</p>
                <div class="mb-2">
                    <input required type="text" class="form-control form-control-lg" name="email" id="email"
                        value="{{ old('email') }}" placeholder="E-Mail Id">

                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-2">
                    <input required type="password" class="form-control" name="password" id="password"
                        placeholder="******" />
                    @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="input-group-append display-flex">
                        <span class="input-group-text" onclick="password_show_hide();">
                            <i class="bi bi-eye" id="show_eye"></i>
                            <i class="bi bi-eye-slash d-none" id="hide_eye"></i>
                        </span>
                    </div>
                </div>
                <div class="d-grid mb-2">
                    <button type="submit" id="login_btn" class="btn btn-login">
                        Login
                    </button>


                    <a href="{{ route(" register") }}" class="text-center text-white">Signup </a>


                </div>
                <div class="row mt-2">
                    <div class="col-sm-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-7 text-end">
                        <p class="mb-1">
                            <a href="{{ route('password.request') }}">I forgot my password</a>
                        </p>


                    </div>
                </div>
            </form>
        </div> --}}



        {{--
        <section id="wrapper" class="login-register">
            <div class="login-box">
                <div class="white-box">
                    <form action="{{ url('/login') }}" class="form-horizontal form-material" id="loginform"
                        method="post">
                        @csrf
                        <h3 align="center">ADMIN LOGIN</h3>

                        <div class="form-group m-t-40">
                            <div class="col-xs-12">
                                <input class="form-control  @error('email') is-invalid @enderror" type="email"
                                    name="email" id="email" value="{{ old('email') }}" required="" placeholder="Email">
                                @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                    name="password" id="password" required="" placeholder="Password">
                                @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                    type="submit" name="submit" value="login">Log In</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </section> --}}








        {{--
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="post" action="{{ url('/login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                            class="form-control @error('email') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                        @error('email')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>

                <p class="mb-1">
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                </p>
            </div>

        </div> --}}

        {{--
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"
        integrity="sha512-++c7zGcm18AhH83pOIETVReg0dr1Yn8XTRw+0bWSIWAVCAwz1s2PwnSj4z/OOyKlwSXc4RLg3nnjR22q0dhEyA=="
        crossorigin="anonymous"></script>

</body>

</html> --}}
