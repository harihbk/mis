<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>misumi</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
          integrity="sha512-0S+nbAYis87iX26mmj/+fWt1MmaKCv80H+Mbo+Ne7ES4I6rxswpfnC6PxmLiw33Ywj2ghbtTw0FkLbMWqh4F7Q=="
          crossorigin="anonymous"/>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css"
          integrity="sha512-rVZC4rf0Piwtw/LsgwXxKXzWq3L0P6atiQKBNuXYRbg2FoRbSTIY0k2DxuJcs7dk4e/ShtMzglHKBOJxW8EQyQ=="
          crossorigin="anonymous"/>

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"
          integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg=="
          crossorigin="anonymous"/>


          <link href="{{ asset('css/logincustom.css') }}" rel="stylesheet">
          <link href="{{ asset('css/adminlogin.css') }}" rel="stylesheet">


</head>
<body class="fix-header">

    <div class="login-logo">
        {{-- <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a> --}}
    </div>



    <div class="login-container">
        <div class="login-logo">
            <img src="{{ asset('/images/best-india-kart-white.png') }}" alt="logo" />
        </div>
        <div>
            @if (session('success'))
            <div class="alert alert-warning" role="alert">
                {{ session('success') }}
            </div>
        @endif
            <form action="{{ url('/login/'.request()->route('type')) }}" class="form-horizontal form-material" id="loginform"  method="post">
                    @csrf
                <p class="login-title">Login into your account</p>
                <input type="hidden" value="{{request()->route('email')}}" name="encoded_email">
                <div class="mb-2">
                    <input required type="text" class="form-control form-control-lg" name="email" id="email" value="{{ old('email') }}" placeholder="E-Mail Id">
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group input-group-lg mb-2">
                    <input required type="password" class="form-control" name="password" id="password" placeholder="******" />
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
                    </div>
                </div>
            </form>
        </div>
</div>
<!-- /.login-box -->

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"
        integrity="sha512-++c7zGcm18AhH83pOIETVReg0dr1Yn8XTRw+0bWSIWAVCAwz1s2PwnSj4z/OOyKlwSXc4RLg3nnjR22q0dhEyA=="
        crossorigin="anonymous"></script>

</body>
</html>
