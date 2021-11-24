<div class="col-md-4">
    <div class="cart-shopping-total">
        <div class="row">
            <div class="col-md-6">
                <h6 class="cart-subtotal-name">Subtotal</h6>
            </div>
            <div class="col-md-6">
                <h6 class="cart-subtotal-price">
                    Rs.
                    <span class="cart-grand-price-viewajax">{{ number_format($total, 2) }}</span>
                </h6>
            </div>
        </div>

        {{-- dicount if present --}}
        @if (isset($settings) && isset($settings->discount) && $settings->discount > 0 && $settings->discount_status ==
        1)
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
        @endif
        {{-- igst if present --}}
        @if (isset($settings) && $settings->igst)
        @php
        $igst = ($total * $settings->igst) / 100 ;
        @endphp
        <div class="row">
            <div class="col-md-6">
                <h6 class="cart-subtotal-name">IGST({{ $settings->igst }})%</h6>
            </div>
            <div class="col-md-6">
                <h6 class="cart-subtotal-price">
                    Rs.
                    <span class="cart-grand-price-viewajax">{{ ($total * $settings->igst) / 100}}</span>
                </h6>
            </div>
        </div>
        @else
        @php
        $igst = 0;
        @endphp
        @endif
        {{-- cgst if present --}}
        @if (isset($settings) && $settings->cgst)
        @php
        $cgst = ($total * $settings->cgst) / 100 ;
        @endphp
        <div class="row">
            <div class="col-md-6">
                <h6 class="cart-subtotal-name">CGST({{ $settings->cgst }})%</h6>
            </div>
            <div class="col-md-6">
                <h6 class="cart-subtotal-price">
                    Rs.
                    <span class="cart-grand-price-viewajax">{{ ($total * $settings->cgst) / 100}}</span>
                </h6>
            </div>
        </div>

        @else

        @php
        $cgst = 0;
        @endphp
        @endif
        <hr>
        <div class="row">
            @php
            $total = $discount + $igst + $cgst ;
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
        <div class="row">
            <div class="col-md-12">
                <div class="cart-checkout-btn text-center">
                    @if (Auth::user())
                    <a href="{{ route('checkout') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO
                        CHECKOUT</a>
                    @else
                    <a href="{{ url('login') }}" class="btn btn-success btn-block checkout-btn">PROCCED TO CHECKOUT</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
