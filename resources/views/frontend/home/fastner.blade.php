<div class="fastiner-wrapper">
    <div>
        <img src="{{ URL::to('/') }}/images/fastiner/banner.jpg" alt="banner">
    </div>
    <div class="fastiner-list-wrapper">
        <div class="fastiner-slider owl-carousel">
           @for ($i=0 ; $i <count($product_part_number) ; $i+=2)
                    @if (isset($product_part_number[$i]->icon) && $product_part_number[$i]->icon)
                        <div>
                            <div class="fastiner-list">
                                <img class="img-fluid banner" src="{{ URL::asset('uploads') }}/{{ $product_part_number[$i]->icon }}" alt="banner">
                                <p>BOLTS</p>
                                <img src="./images/grip-product-logo.png" alt="logo" class="slider-logo">
                            </div>
                                @php
                                $var = $i+1;
                                @endphp
                    @if (isset($product_part_number[$var]->icon) && isset($product_part_number[$var]->icon))
                        <div class="fastiner-list mt-4">
                            <img class="img-fluid banner" src="{{ URL::asset('uploads') }}/{{ $product_part_number[$var]->icon }}" alt="banner">
                            <p>BOLTS</p>
                            <img src="./images/grip-product-logo.png" alt="logo" class="slider-logo">
                        </div>
                    @endif
                            </div>
                    @endif
           @endfor





        </div>
    </div>
</div>
