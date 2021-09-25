
@extends('frontend.theme')

@section('content')


<!-- start page content -->
<div class="container">
                @if (session()->has('success_message'))
                <div class="spacer"></div>
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
            @endif

    <div class="row">


        <div class="col-md-5 offset-md-1">
            <hr>
            <h1 class="lead" style="font-size: 1.5em">Checkout</h1>

            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
            </div>
            @endif



            <hr>
            <div class="step1">
            <h3 class="lead" style="font-size: 1.2em; margin-bottom: 1.6em;"><span  class="billingcheckout">Billing details</span></h3>

            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf()


                <input type="radio" id="html" name="radio_address" value="exist" class="radioclass" checked>
                <label for="html">I want to use an existing address</label><br>


                <div class="form-group existaddress">
                    <select name="existaddress" id="existaddress" class="form-control ">
                        @foreach ($exist_address as $item)
                            <option value="{{ $item->id }}">{{ $item->billing_email }}</option>
                        @endforeach
                    </select>
                </div>



                <input type="radio" id="css" name="radio_address" value="_new" class="radioclass">
                <label for="css">I want to use a new address</label><br>



                <div class="step1_toogle newaddress" style="display:none">
                <div class="form-group">
                    <label for="email" class="light-text">Email Address</label>
                    @guest
                        <input type="text" name="email" class="form-control my-input" >
                    @else
                        <input type="text" name="email" class="form-control my-input" value="{{ auth()->user()->email }}" readonly required>
                    @endguest
                </div>
                <div class="form-group">
                    <label for="name" class="light-text">Name</label>
                    <input type="text" name="name" class="form-control my-input" >
                </div>
                <div class="form-group">
                    <label for="address" class="light-text">Address</label>
                    <input type="text" name="address" class="form-control my-input" >
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city" class="light-text">City</label>
                            <input type="text" name="city" class="form-control my-input" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="province" class="light-text">Province</label>
                        <input type="text" name="province" class="form-control my-input" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="postal_code" class="light-text">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control my-input" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="light-text">Phone</label>
                        <input type="text" name="phone" class="form-control my-input" >
                    </div>
                </div>

            </div>

                <button type="submit" class="btn btn-success custom-border-success btn-block">Complete Order</button>
            </form>
            </div>



        </div>






        <div class="col-md-5 offset-md-1">

        <input type="text" name="couponcode" id="couponcode" class="couponcode form-control" placeholder="Apply Coupon Code">


            <hr>
            <h3>Your Order</h3>
            <hr>
            <table class="table table-borderless table-responsive">
                <tbody>
                    @php $total="0" @endphp

                    @if (isset($cart_data) and count($cart_data) > 0)

                        @foreach ($cart_data as $data)
                            <tr>
                                   <td>
                                    <a class="entry-thumbnail" href="javascript:void(0)">
                                        <img src="{{url('')}}/uploads/{{ $data['item_image'] }}"  width="70px" alt="">
                                    </a>
                                    {{-- <a href="{{ route('shop.show', $item->model->slug) }}">
                                        <img src="{{ productImage($item->model->image) }}" height="100px" width="100px"></td>
                                    </a> --}}
                                <td>
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <h3 class="lead light-text">{{ $data['item_name'] }}</h3>
                                        <p class="light-text">{{ $data['product_length'] }}</p>
                                        <h3 class="light-text lead text-small"><span>&#8377;</span>{{ number_format($data['item_price'], 2) }}</h3>
                                    </a>
                                </td>
                                <td>

                                    <span class="quantity-square">{{ $data['item_quantity'] }}</span>
                                </td>
                            </tr>
                            @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                        @endforeach
                        @else

                        <div>
                            <a href="{{ url('/') }}" class="btn btn-upper btn-warning outer-left-xs">Continue Shopping</a>
                        </div>

                        @endif

                </tbody>
            </table>
            <hr>



            <div class="row">
                <div class="col-md-6">
                    <h6 class="cart-subtotal-name">Total</h6>
                </div>
                <div class="col-md-6">
                    <h6 class="cart-subtotal-price">
                        Rs.
                        <span class="cart-grand-price-viewajax">{{$total }}</span>
                    </h6>
                </div>
            </div>





                    {{-- dicount if present --}}

                    {{-- @if (isset($settings) && $settings->discount_status == 1)
                    @php
                        $discount = $total * (1 - $settings->discount / 100);
                    @endphp
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="cart-subtotal-name">Discount({{ $settings->discount }})%</h6>
                        </div>
                        <div class="col-md-6">
                            <h6 class="cart-subtotal-price">
                                Rs.
                                <span class="cart-grand-price-viewajax">{{ $total * (1 - $settings->discount / 100 )}}</span>
                            </h6>
                        </div>
                    </div>

                    @else
                    @php
                    $discount = $total;
                    @endphp
                    @endif --}}





                {{-- dicount if present --}}
                    @if (session()->has('coupon'))

                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="cart-subtotal-name">Discount({{ session('coupon')['name'] ?? '' }})%</h6>
                            <form class="form-inline" action="{{ route('coupon.destroy') }}" method="POST" style="display:inline">
                                @csrf()
                                @method('DELETE')
                                <button class="inline-form-button" type="submit">Remove</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h6 class="cart-subtotal-price">
                                Rs.
                                <span class="cart-grand-price-viewajax">{{ session('coupon')['discount'] ?? '' }}</span>
                            </h6>
                        </div>
                    </div>

                    @php
                    $discount = (isset(session('coupon')['discount']) && session('coupon')['discount']) ? session('coupon')['discount'] : 0;
                    @endphp

                   <hr>
                    {{-- <div class="row">
                        <div class="col-md-4">
                            <span class="light-text">New Subtotal</span>
                        </div>
                        <div class="col-md-4 offset-md-4">
                            <span class="light-text" style="display: inline-block"></span>
                        </div>
                    </div> --}}

                    @else
                    @php
                    $discount = 0;
                    @endphp
                    @endif



                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="cart-subtotal-name">SubTotal</h6>
                        </div>
                        <div class="col-md-6">
                            <h6 class="cart-subtotal-price">
                                Rs.
                                <span class="cart-grand-price-viewajax">{{ abs($discount-$total) }}</span>
                            </h6>
                        </div>
                    </div>
                    @php
                        $total = abs($discount-$total);
                    @endphp




                    {{-- igst if present --}}
                    @if (isset($settings) && $settings->igst)
                    @php
                        $igst =   ($total *  $settings->igst) / 100 ;
                    @endphp
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="cart-subtotal-name">IGST({{ $settings->igst }})%</h6>
                        </div>
                        <div class="col-md-6">
                            <h6 class="cart-subtotal-price">
                                Rs.
                                <span class="cart-grand-price-viewajax">{{ ($total *  $settings->igst) / 100}}</span>
                            </h6>
                        </div>
                    </div>

                    @else

                    @php
                    $igst =  0;
                    @endphp

                    @endif


                    {{-- cgst if present --}}
                    @if (isset($settings) && $settings->cgst)
                    @php
                        $cgst =   ($total *  $settings->cgst) / 100 ;
                    @endphp
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="cart-subtotal-name">CGST({{ $settings->cgst }})%</h6>
                        </div>
                        <div class="col-md-6">
                            <h6 class="cart-subtotal-price">
                                Rs.
                                <span class="cart-grand-price-viewajax">{{ ($total *  $settings->cgst) / 100}}</span>
                            </h6>
                        </div>
                    </div>

                    @else

                    @php
                    $cgst =  0;
                    @endphp

                    @endif





                    <hr>
                    <div class="row">
                        @php

                        $total =   $total + $igst + $cgst ;
                        @endphp
                        <div class="col-md-6">
                            <h6 class="cart-grand-name">Grand Total</h6>
                        </div>
                        <div class="col-md-6">
                            <h6 class="cart-grand-price">
                                Rs.
                                <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span>
                            </h6>
                        </div>
                    </div>








            <hr>
            @if (!session()->has('coupon'))
                <form action="{{ route('coupon.store') }}" method="POST">
                    @csrf()
                    <label for="coupon_code">Have a coupon ?</label>
                    <input type="text" name="coupon_code" id="coupon" class="form-control my-input" placeholder="123456" required>
                    <button type="submit" class="btn btn-success custom-border-success btn-block">Apply Coupon</button>
                </form>
            @endif
        </div>

    </div>

</div>
<!-- end page content -->

<style>
    .quantity-square{
    border: 1px solid #222;
    padding: 0.5em;
    }

</style>



<script>
    $(document).ready(function(){
        $(".billingcheckout").click(function(){

         // $(".step1_toogle").slideToggle(1000);
        })


        $(".radioclass").click(function(){
            val = $(this).val();
            if(val == "exist"){
                $(".newaddress").hide();
                $(".existaddress").show();
                } else {
                    $(".newaddress").show();
                $(".existaddress").hide();
                }


        })
    })








    // Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $(".continue1").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      address: "required",
      name: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },

    },
    // Specify validation error messages
    messages: {
      address: "Please enter your firstname",
      name: "Please enter your lastname",

      email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
        alert("dsf")
    //  form.submit();
    }
  });
});
</script>

@endsection
