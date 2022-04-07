<div class="row my-4">
    <div class="col text-center">
        <img class="img-fluid" src="./images/build-banner.jpg" alt="banner">
    </div>
</div>
<div class="fastiner-wrapper">
    <div>
        <img src="./images/tools/banner.jpg" alt="banner">
    </div>
    <div class="fastiner-list-wrapper">
        <div class="fastiner-slider owl-carousel">
            <div>
                <?php

                    // foreach ($Rivertnut as $key => $value) {

                        for( $i=0 ; $i < count($Rivertnut);$i+=2 ){

                                ?>
                                <a href="{{ route('revert',str_replace(' ', '_', $Rivertnut[$i]->name)) }}">
                                    <div class="fastiner-list">
                                        <img class="img-fluid" src="{{url('/uploads/')}}/{{ $Rivertnut[$i]->icon }}"  style="width:40%" alt="banner" >
                                        <p>{{ (isset($Rivertnut[$i]->name) ? $Rivertnut[$i]->name : '') }} </p>
                                        <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                                    </div>
                                </a>

                                <?php
                                if(isset($Rivertnut[$i+1])){
                                    ?>
                                     <a href="{{ route('revert',str_replace(' ', '_', $Rivertnut[$i+1]->name)) }}">
                                     <div class="fastiner-list mt-4">
                                        <img class="img-fluid" src="{{url('/uploads/')}}/{{ $Rivertnut[$i+1]->icon }}" alt="banner"  style="width:40%">
                                        <p>{{ (isset($Rivertnut[$i+1]->name) ? $Rivertnut[$i+1]->name : '') }} </p>
                                        <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                                    </div>
                                     </a>
                                    <?php
                                }
                                ?>


                            <?php


                    }
                ?>
            </div>




            {{-- <div>
                <div class="fastiner-list">
                    <img class="img-fluid" src="./images/tools/banner-1.jpg" alt="banner">
                    <p>BLIND RIVETING</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
                <div class="fastiner-list mt-4">
                    <img class="img-fluid" src="./images/tools/banner-2.jpg" alt="banner">
                    <p>BLIND RIVET NUT</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
            </div>
            <div>
                <div class="fastiner-list">
                    <img class="img-fluid" src="./images/tools/banner-3.jpg" alt="banner">
                    <p>BATTERY RIVETING</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
                <div class="fastiner-list mt-4">
                    <img class="img-fluid" src="./images/tools/banner-4.jpg" alt="banner">
                    <p>HAND TOOLS</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
            </div>
            <div>
                <div class="fastiner-list">
                    <img class="img-fluid" src="./images/tools/banner-5.jpg" alt="banner">
                    <p>BOLTGRIP</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
                <div class="fastiner-list mt-4">
                    <img class="img-fluid" src="./images/tools/banner-6.jpg" alt="banner">
                    <p>SELF PIERCING</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
            </div>
            <div>
                <div class="fastiner-list">
                    <img class="img-fluid" src="./images/tools/banner-7.jpg" alt="banner">
                    <p>ELECTRIC RIVETING</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
                <div class="fastiner-list mt-4">
                    <img class="img-fluid" src="./images/tools/banner-8.jpg" alt="banner">
                    <p>BLIND RIVETING</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
            </div>
            <div>
                <div class="fastiner-list">
                    <img class="img-fluid" src="./images/tools/banner-1.jpg" alt="banner">
                    <p>BOLTS</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
                <div class="fastiner-list mt-4">
                    <img class="img-fluid" src="./images/tools/banner-2.jpg" alt="banner">
                    <p>BOLTS</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
            </div>
            <div>
                <div class="fastiner-list">
                    <img class="img-fluid" src="./images/tools/banner-3.jpg" alt="banner">
                    <p>BOLTS</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
                <div class="fastiner-list mt-4">
                    <img class="img-fluid" src="./images/tools/banner-4.jpg" alt="banner">
                    <p>BOLTS</p>
                    <img class="slider-logo" src="./images/grip-product-logo.png" alt="slider-logo">
                </div>
            </div> --}}
        </div>
    </div>
</div>


<div class="product-wrapper">
    <h2 class="text-center">Deal Of the Day</h2>
    <div class="row row-cols-md-5 row-cols-sm-1">

        @foreach ($deal_of_the_day as $item)
        <a href="{{ route('website.partnumberpage',$item->id) }}">
        <div class="col">
            <div class="product-list">
                <img class="img-fluid" src="{{url('/uploads/'.$item->icon)}}" alt="banner">
                <div class="title">{{$item->part_number}}</div>
            </div>
        </div>
        </a>
        @endforeach

    </div>
</div>


{{--
<div class="product-wrapper">
    <h2 class="text-center">OUR OTHER PRODUCTS</h2>
    <div class="row row-cols-md-5 row-cols-sm-1">
        <div class="col">
            <div class="product-list">
                <img class="img-fluid" src="./images/products/products-1.jpg" alt="banner">
                <div class="title">INDUSTRIAL SCREW</div>
            </div>
        </div>
        <div class="col">
            <div class="product-list">
                <img class="img-fluid" src="./images/products/products-2.jpg" alt="banner">
                <div class="title">INDUSTRIAL BOLT</div>
            </div>
        </div>
        <div class="col">
            <div class="product-list">
                <img class="img-fluid" src="./images/products/products-3.jpg" alt="banner">
                <div class="title">AUTOMATIC RIVETING SYSETEM</div>
            </div>
        </div>
        <div class="col">
            <div class="product-list">
                <img class="img-fluid" src="./images/products/products-4.jpg" alt="banner">
                <div class="title">CAGENUT</div>
            </div>
        </div>
        <div class="col">
            <div class="product-list">
                <img class="img-fluid" src="./images/products/products-5.jpg" alt="banner">
                <div class="title">FACE SHIELD</div>
            </div>
        </div>
        <div class="col">
            <div class="product-list">
                <img class="img-fluid" src="./images/products/products-1.jpg" alt="banner">
                <div class="title">INDUSTRIAL SCREW</div>
            </div>
        </div>
        <div class="col">
            <div class="product-list">
                <img class="img-fluid" src="./images/products/products-2.jpg" alt="banner">
                <div class="title">INDUSTRIAL BOLT</div>
            </div>
        </div>
        <div class="col">
            <div class="product-list">
                <img class="img-fluid" src="./images/products/products-3.jpg" alt="banner">
                <div class="title">AUTOMATIC RIVETING SYETEM</div>
            </div>
        </div>
        <div class="col">
            <div class="product-list">
                <img class="img-fluid" src="./images/products/products-4.jpg" alt="banner">
                <div class="title">CAGENUT</div>
            </div>
        </div>
        <div class="col">
            <div class="product-list">
                <img class="img-fluid" src="./images/products/products-5.jpg" alt="banner">
                <div class="title">GRIP THREAD COIL</div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="other-services-wrapper">
    <h2>OTHER KEY SERVICES</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="other-services-list">
                <div class="title">KITTING AND PACKAGING SERVICES - KPS</div>
                <p class="content">We provides your kitting solutions by kitting all the fasteners on the bill of
                    materials in a single kit , that is all your fasteners are ready for you when and how you need
                    them .We
                    deliver together ,on time and in top quality.</p>
                <img class="img-fluid" src="./images/other-services/banner-1.jpg" alt="banner">
            </div>
        </div>
        <div class="col-md-4">
            <div class="other-services-list">
                <div class="title">KITTING AND PACKAGING SERVICES - KPS</div>
                <p class="content">We provides your kitting solutions by kitting all the fasteners on the bill of
                    materials in a single kit , that is all your fasteners are ready for you when and how you need
                    them .We
                    deliver together ,on time and in top quality.</p>
                <img class="img-fluid" src="./images/other-services/banner-2.jpg" alt="banner">
            </div>
        </div>
        <div class="col-md-4">
            <div class="other-services-list">
                <div class="title">PROTO BUILDING SUPPORT - PBS</div>
                <p class="content">We provides your kitting solutions by kitting all the fasteners on the bill of
                    materials in a single kit , that is all your fasteners are ready for you when and how you need
                    them .We deliver together ,on time and in top quality.</p>
                <img class="img-fluid" src="./images/other-services/banner-3.jpg" alt="banner">
            </div>
        </div>
    </div>
</div> --}}
