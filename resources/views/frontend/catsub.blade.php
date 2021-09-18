





























<div class="m-5">
    <h4 class="mb-0 text-secondary"></h4>
    <h1><small class="text-secondary"></small></h1>
    <ul class="nav flex-column">
        @foreach($category as $k=>$cat)
        <li class="nav-item">
            <a class="nav-link" href="#first{{$k}}" data-toggle="collapse" aria-expanded="false"
                aria-controls="first">{{ $cat->name }}</a>
            <div class="collapse" id="first{{$k}}">
                <ul class="nav flex-column ml-3" style="margin-left: 70px;">
                    @foreach($cat->subcategory as $kk=>$subcat)
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('website.parentcats',$subcat->id) }}">{{ $subcat->name }}</a>

                        {{-- <div class="collapse" id="first{{$k}}{{$kk}}">
                        <ul class="nav flex-column ml-3" style="margin-left: 70px;">
                            @foreach($subcat->parentcategory as $kkk=>$parentcat)
                            <li class="nav-item"><a class="nav-link" href="#first{{$k}}{{$kk}}{{$kkk}}"
                                    data-toggle="collapse" aria-expanded="false" aria-controls="first"
                                    href="#">{{ $parentcat->name }}</a>

                                <div class="collapse" id="first{{$k}}{{$kk}}{{$kkk}}">
                                    <ul class="nav flex-column ml-3" style="margin-left: 70px;">
                                        @foreach($parentcat->childcategories as $childcat)
                                        <li class="nav-item"><a href="{{  route('website.product', $childcat->id) }}"
                                                class="nav-link">{{ $childcat->name }}</a>

                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </li>
                            @endforeach
                        </ul>
            </div> --}}
        </li>
        @endforeach
    </ul>
</div>
</li>
@endforeach

</ul>
</div>


<!--


<div class="m-5">
  <h4 class="mb-0 text-secondary">Bootstrap 4</h4>
  <h1>Vertical Collapsible Nav <small class="text-secondary">without CSS/JS</small></h1>
  <ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="#first" data-toggle="collapse" aria-expanded="false" aria-controls="first">First</a>
      <div class="collapse" id="first">
        <ul class="nav flex-column ml-3">
          <li class="nav-item"><a class="nav-link" href="#0">1 First</a></li>
          <li class="nav-item"><a class="nav-link" href="#0">2 First</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link active" href="#second" data-toggle="collapse" aria-expanded="false" aria-controls="second">Second</a>
      <div class="collapse" id="second">
        <ul class="nav flex-column ml-3">
          <li class="nav-item"><a class="nav-link" href="#0">1 Second</a></li>
          <li class="nav-item"><a class="nav-link" href="#0">2 Second</a></li>
          <li class="nav-item"><a class="nav-link" href="#0">3 Second</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link" href="#third" data-toggle="collapse" aria-expanded="false" aria-controls="third">Third</a>
      <div class="collapse" id="third">
        <ul class="nav flex-column ml-3">
          <li class="nav-item"><a class="nav-link" href="#0">1 Third</a></li>
          <li class="nav-item"><a class="nav-link" href="#0">2 Third</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link disabled" href="#0">Fourth</a></li>
  </ul>
</div> -->
<!--
<ul >
@foreach($category as $cat)
  <li>
    {{ $cat->name }}
       <ul  >
       @foreach($cat->subcategory as $subcat)
         <li>{{ $subcat->name }}
            <ul  >
                     @foreach($subcat->parentcategory as $parentcat)
                        <li>{{ $parentcat->name }}
                               <ul  >
                                    @foreach($parentcat->childcategories as $childcat)
                                        <li>{{ $childcat->name }}
                                            <ul  >
                                                @foreach($childcat->products as $product)
                                                    <li> {{ $product->name }}
                                                            <ul  >
                                                                @foreach($product->product_part_number as $partnumber)
                                                                <li>{{ $partnumber->part_number }}

                                                                </li>
                                                                @endforeach
                                                            </ul >
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                               </ul>
                        </li>
                     @endforeach
            </ul>
         </li>
       @endforeach
       </ul>
  </li>
@endforeach
</ul> -->
