<div class="fastiner-wrapper">
    <div>
        <img src="{{ URL::to('/') }}/images/fastiner/banner.jpg" alt="banner">
    </div>
    {{-- <div class="fastiner-list-wrapper">
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
    </div> --}}



    <div class="fastiner-list-wrapper">
        <div class="fastiner-slider owl-carousel">

{{--
                <?php
                        for( $i=0 ; $i < count($subcategory);$i+=2 ){

                                ?>
                                <a href="{{ route('website.parentcats',$subcategory[$i]->id) }}">
                                    <div class="fastiner-list">
                                        <img class="img-fluid banner" src="{{ URL::asset('uploads') }}/{{ $subcategory[$i]->icon }}"  style="width:40%" alt="banner" >
                                        <p>{{ (isset($subcategory[$i]->name) ? $subcategory[$i]->name : '') }} </p>
                                        <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                                    </div>
                                </a>

                                <?php
                                if(isset($subcategory[$i+1])){
                                    ?>
                                     <a href="{{ route('website.parentcats',$subcategory[$i+1]->id) }}">
                                     <div class="fastiner-list mt-4">
                                        <img class="img-fluid banner" src="{{ URL::asset('uploads') }}/{{ $subcategory[$i+1]->icon }}" alt="banner"  style="width:40%">
                                        <p>{{ (isset($subcategory[$i+1]->name) ? $subcategory[$i+1]->name : '') }} </p>
                                        <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                                    </div>
                                     </a>
                                    <?php
                                }
                                ?>


                            <?php


                    }
                ?> --}}


           @for ($i=0 ; $i <count($subcategory) ; $i+=2)

                    @if (isset($subcategory[$i]->icon) && $subcategory[$i]->icon)
                        <div>
                            <a class="nav-link"
                                        href="{{ route('website.parentcats',$subcategory[$i]->id) }}">


                                        <div class="fastiner-list">
                                            <img class="img-fluid banner" src="{{ URL::asset('uploads') }}/{{ $subcategory[$i]->icon }}" alt="banner">
                                            <p>{{ $subcategory[$i]->name }}</p>
                                            <img src="./images/grip-product-logo.png" alt="logo" class="slider-logo">
                                        </div>

                                    </a>

                                @php
                                $var = $i+1;
                                @endphp
                    @if (isset($subcategory[$var]->icon) && isset($subcategory[$var]->icon))

                            <a class="nav-link"
                            href="{{ route('website.parentcats',$subcategory[$var]->id) }}">
                                <div class="fastiner-list mt-4">
                                    <img class="img-fluid banner" src="{{ URL::asset('uploads') }}/{{ $subcategory[$var]->icon }}" alt="banner">
                                    <p>{{ $subcategory[$var]->name }}</p>
                                    <img src="./images/grip-product-logo.png" alt="logo" class="slider-logo">
                                </div>

                            </a>


                    @endif
                            </div>
                    @else
                      <div>
                        <div class="fastiner-list mt-4">
                            <img class="img-fluid banner" src="#" alt="banner">
                            <p>BOLTS</p>
                            <img src="./images/grip-product-logo.png" alt="logo" class="slider-logo">
                        </div>
                      </div>
                    @endif
           @endfor
        </div>
    </div>


</div>
