@extends('frontend.theme')
@section('content')

@include('auth.passwords.navbar')


    <div class="container">


        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

        <div class="container">
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="forgot-password-wrapper">
                    <img class="forgot-password-icon" src="{{ url('/images/forgot-password-icon.png') }}" alt="Forgot Password" />
                    <h2 class="title">Reset your password</h2>
                    <!--<p class="mrgB0">
                        Lost your password? Please enter your email address.
                    </p>
                    <p>You will receive a link to create a new password via email.</p>-->
                    <div class="mb-3">
                        <label for="password1" class="form-label">Enter E-MailID</label>
                        <input type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email">
                        @error('email')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" id="ResetSubmit" name="ResetSubmit" class="btn btn-lg btn-primary">
                            <span class="bi bi-box-arrow-right"></span> Reset
                        </button>
                        <!--<button id="btnBackToLogin" type="button" class="btn btn-link forgot-back-login">Back to Login</button>-->
                    </div>
                </div>
            </form>
        </div>













{{--
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
                    </div>

                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{ route("login") }}">Login</a>
            </p>
            <p class="mb-0">
                <a href="{{ route("register") }}" class="text-center">Register a new membership</a>
            </p>
        </div>

    </div>
</div> --}}


</div>

@endsection
