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



           @for ($i=0 ; $i <count($Rivertnut) ; $i+=2)

                    @if (isset($Rivertnut[$i]->icon) && $Rivertnut[$i]->icon)
                        <div>
                            <div style=" width:250px;max-width:250px;">
                            <a class="nav-link"
                                        href="{{ route('revert',str_replace(' ', '_', $Rivertnut[$i]->name)) }}">


                                        <div class="fastiner-list">
                                            <img class="img-fluid banner" src="{{ URL::asset('uploads') }}/{{ $Rivertnut[$i]->icon }}" alt="banner" style="    width: auto;
    height: 80px;" >
                                            <p style=" white-space: nowrap; 
  width: 100%; 
  overflow: hidden;
  text-overflow: ellipsis; 
  ">{{ $Rivertnut[$i]->name }}</p>
                                            <img src="./images/grip-product-logo.png" alt="logo" class="slider-logo">
                                        </div>

                            </a>
                            </div>

                                @php
                                $var = $i+1;
                                @endphp
                    @if (isset($Rivertnut[$var]->icon) && isset($Rivertnut[$var]->icon))

                            <a class="nav-link"
                            href="{{ route('revert',str_replace(' ', '_', $Rivertnut[$i]->name)) }}">
                                <div class="fastiner-list mt-4">
                                    <img class="img-fluid banner" src="{{ URL::asset('uploads') }}/{{ $Rivertnut[$var]->icon }}" alt="banner" style="    width: auto;
    height: 80px;">
                                    <p
                                    style=" white-space: nowrap; 
  width: 100%; 
  overflow: hidden;
  text-overflow: ellipsis; 
  ">{{ $Rivertnut[$var]->name }}</p>
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
                            <img src="./images/grip-product-logo.png" alt="logo" class="slider-logo" style="width:40%">
                        </div>
                      </div>
                    @endif
           @endfor
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
