@extends('frontend.theme')
@section('content')
<ol class="breadcrumb justify-content-center">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Library</li>
    <li class="breadcrumb-item active">New customer registration</li>
</ol>
<div class="container">
    <div class="row justify-content-md-center my-2">
        <div class="col-md-auto">
                    <div class="card">
                        <div class="card-body">
                    <h4>User Registration</h4>
                    <p>Thank you for your interest in Best Indiakart.Please input following questionnaire to start
                        business with
                        Best Indiakart.</p>
                    <form method="post" action="{{ route('register') }}" id="regfrm" name="regfrm">
                        @csrf
                        <div class="register-form-title">Register Method</div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <label class="input-group-text col-md-4 no-border-top-right" for="userMethod">User Method *</label>
                                    <select class="form-select select-border no-border-top-left" id="userType" name="userType" required="required">
                                        <option value="" selected>Choose...</option>
                                        <option value="1">Individual</option>
                                        <option value="2">Company</option>
                                    </select>
                                </div>
                                <label id="userType-error" class="error" for="userType"></label>
                            </div>
                        </div>
                        <div class="register-form-title">login Information</div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <label class="input-group-text col-md-4 no-border-top-right" for="email">E-mail *</label>
                                    <input id="email" type="email" name="email" require class="form-control no-border-top-left"
                                        placeholder="E-mail" aria-label="email" aria-describedby="basic-addon1"
                                        required="required" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                <span id="email-error" class="error" for="email">{{ $message }}</span>
                                @enderror
                                <label id="email-error" class="error" for="email"></label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <label class="input-group-text col-md-4 no-border-top-right" for="userLoginUserId">Login UserID
                                        *</label>
                                    <input id="userLoginUserId" type="text" name="userLoginUserId" require
                                        class="form-control no-border-top-left" placeholder="Login UserID" aria-label="userLoginUserId"
                                        aria-describedby="basic-addon1" required="required"
                                        value="{{ old('userLoginUserId') }}">
                                </div>
                                <label id="userLoginUserId-error" class="error" for="userLoginUserId"></label>
                            </div>
                        </div>
                        <div class="row align-items-center mb-3">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <label class="input-group-text col-md-4 no-border-top-right" for="password">Password *</label>
                                    <input id="password" type="password" name="password" class="form-control no-border-top-left"
                                        placeholder="Password" aria-label="password" aria-describedby="basic-addon1"
                                        required="required">
                                </div>
                                @error('password')
                                <span id="password-error" class="error" for="password">{{ $message }}</span>
                                @enderror
                                <label id="password-error" class="error" for="password"></label>
                            </div>
                            <div class="col-md-4">
                                *4 to 15 characters.
                            </div>
                        </div>
                        <div class="register-form-title">User Information</div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <label class="input-group-text col-md-4 no-border-top-right" for="name">Name *</label>
                                    <input id="name" name="name" type="text" require class="form-control no-border-top-left"
                                        placeholder="Name" aria-label="name" aria-describedby="basic-addon1"
                                        required="required" value="{{ old('name') }}">
                                </div>
                                <label id="name-error" class="error" for="name"></label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <label class="input-group-text col-md-4 no-border-top-right" for="mobileno">Mobile Number *</label>
                                    <input id="mobileno" name="mobileno" type="text" require required="required"
                                        class="form-control no-border-top-left" placeholder="Mobile Number" aria-label="mobileno"
                                        aria-describedby="basic-addon1" value="{{ old('mobileno') }}">
                                </div>
                                @error('mobileno')
                                <span id="mobileno-error" class="error" for="mobileno">{{ $message }}</span>
                                @enderror
                                <label id="mobileno-error" class="error" for="mobileno"></label>
                            </div>
                        </div>
                        <div class="row mb-3" id="userCompanydiv">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <label class="input-group-text col-md-4 no-border-top-right" for="userCompany">Company or
                                        Institution</label>
                                    <input id="userCompany" name="userCompany" require type="text" class="form-control no-border-top-left"
                                        placeholder="Company or Institution" aria-label="userCompany"
                                        aria-describedby="basic-addon1" value="{{ old('userCompany') }}">
                                </div>
                                <label id="userCompany-error" class="error" for="userCompany"></label>
                            </div>
                        </div>
                        <div class="row mb-3" id="userCompanyGSTdiv">
                            <div class="col-md-8">
                                <div class="input-group">
                                    <label class="input-group-text col-md-4 no-border-top-right" for="userCompany">Company GST NO</label>
                                    <input id="userCompanyGST" name="userCompanyGST" require type="text"
                                        class="form-control no-border-top-left" placeholder="Company GST NO" aria-label="userCompanyGST"
                                        aria-describedby="basic-addon1" value="{{ old('userCompanyGST') }}">
                                </div>
                                <label id="userCompanyGST-error" class="error" for="userCompanyGST"></label>
                            </div>
                        </div>
                        <div class="register-form-title pb-1">Subscribe to Newsletters</div>
                        <div class="form-sub-title">Will you receive information from BEST INDIAKART?</div>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="newsletter" id="radioYes"
                                    value="option1">
                                <label class="form-check-label" for="radioYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="newsletter" id="radioNo"
                                    value="option2">
                                <label class="form-check-label" for="radioNo">No</label>
                            </div>
                        </div>
                        <button class="btn btn-primary my-3 py-2 px-5" type="submit">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>





    <style>
        .has-error {
            border: none !important;
        }

        label.error {
            margin-left: 1px;
            width: auto;
            display: block;
            color: #f90000 !important;
            font-weight: normal;
            font-size: 14px;
            line-height: 2;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>

    <script>
        $(document).ready(function(){

        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
        $('#userCompanyGSTdiv').hide();
        $('#userCompanydiv').hide();
        $('#userType').on('change', function() {
            var userType = $("#userType").val();
            if(userType=='1'){
                $('#userCompanyGSTdiv').hide();
                $('#userCompanydiv').hide();
            }
            else if(userType=='2'){
                $('#userCompanyGSTdiv').show();
                $('#userCompanydiv').show();
            }
        });



       // $('#RegisterSubmit').on('click', function() {
            $("#regfrm").validate({

                rules: {
                    userName: {
                        required: true,
                        Alphabets: true,
                        minlength: 3,
                        maxlength: 25,
                    },
                    userType: {
                        required: true,
                        notEqual: '0'

                    },
                    email: {
                        required: true,
                        ValidateEmail:true,
                        minlength:4,
                        maxlength:50,
                        remote: {
                            url: "{{ route('emailcheck') }}",
                            type: "post",

                        }
                    },
                    userLoginUserId: {
                        required: true,
                        minlength:4,
                        maxlength:25,
                        //  remote: {
                        //     url: "/demo/checkUsername.php",
                        //     type: "get",
                        //     data: {
                        //         id:'NULL'
                        //     }
                        // }
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 15
                    },
                    mobileno: {
                        required: true,
                        Numbers:true,
                        minlength:10,
                        maxlength:10,
                        remote: {
                            url: "{{ route('mobilecheck') }}",
                            type: "post",

                        }
                    },
                    userCompany: {
                        required: function(){
                            return $("#userType").val() == 2 ? true : false
                        },
                        Alphabets: true,
                        minlength: 3,
                        maxlength: 25,
                    },
                    userCompanyGST: {
                        required: function(){
                            return $("#userType").val() == 2 ? true : false
                        },
                        user_Alphabets: true,
                        minlength: 3,
                        maxlength: 25,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter the Name.",
                        Alphabets: "Please enter only alphabets, no other characters allowed.",
                        minlength: "Please enter at least 3 characters  Name.",
                        maxlength: "Please enter only upto 25 characters  Name."
                    },
                    userType: {
                        required: "Please select the User Method.",
                        notEqual: "Please choose atleast User Method."
                    },
                    email: {
                        required: "Please enter the Email.",
                        ValidateEmail:"Please enter the valid Email.",
                        minlength: "Please enter at least 4 characters  Email.",
                        maxlength: "Please enter only upto 50 characters  Email.",
                        remote : "Entered Email already exists, Please select another.",
                    },
                    userLoginUserId: {
                        required: "Please enter the Login UserID.",
                        user_Alphabets: "Please enter only alphabets, numbers, dot.No other characters allowed.",
                        minlength: "Please enter at least 4 characters  Login UserID.",
                        maxlength: "Please enter only upto 25 characters  Login UserID.",
                        remote : "Entered User ID already exists, Please select another.",
                    },
                    password: {
                        required: "Please enter the password.",
                        user_Alphabets: "Please enter only alphabets, numbers, dot.No other characters allowed.",
                        minlength: "Please enter at least 4 characters  Password.",
                        maxlength: "Please enter only upto 15 characters  Password."
                    },
                    mobileno: {
                        required: "Please enter the Mobile Number.",
                        Numbers: "Please enter valid Mobile number.",
                        minlength: "Please enter the minimum 10 digits mobile number.",
                        maxlength: "Please enter only upto 10 digits mobile number.",
                        remote : "Entered Mobile no already exists, Please select another.",
                    },
                    userCompany: {
                        required: "Please enter the Company or Institution Name.",
                        Alphabets: "Please enter only alphabets, no other characters allowed.",
                        minlength: "Please enter at least 3 characters  Company Name.",
                        maxlength: "Please enter only upto 25 characters  Company Name."
                    },
                    userCompanyGST: {
                        required: "Please enter the Company GST.",
                        user_Alphabets: "Please enter only alphabets & numbers, no other characters allowed.",
                        minlength: "Please enter at least 3 characters  Company GST.",
                        maxlength: "Please enter only upto 25 characters  Company GST."
                    },
                },
                submitHandler: function(form) {

                    form.submit();
                    }
            });
            // Adding rules
            $.validator.addMethod("Numbers", function(value, element) {
                return this.optional(element) || /^[0-9]+$/.test(value);
            }, "This field consist of number only.");
            $.validator.addMethod("ValidateEmail", function(value, element) {
                return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
            }, "Please enter valid email address.");
            $.validator.addMethod("user_Alphabets", function(value, element) {
                return this.optional(element) || /^[0-9a-zA-Z\s.]+$/.test(value);
            }, "This field can only consist of alphabetical and space.");
            $.validator.addMethod("Alphabets", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s.]+$/.test(value);
            }, "This field can only consist of alphabetical and space.");
            $.validator.addMethod("notEqual", function (value, element, param) {
                return this.optional(element) || value != '0';
            });
        });
   // });
    </script>
















    {{--



    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                        @error('name')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                        @error('email')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="type" name="mobileno" value="{{ old('mobileno') }}"
                            class="form-control @error('mobileno') is-invalid @enderror" placeholder="Phone no">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                        @error('mobileno')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="input-group mb-3">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                        @error('password')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>

                    </div>
                </form>

                <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
            </div>

        </div>

    </div> --}}

</div>

@endsection
