@extends('frontend.theme')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="nav-category-wrapper">
                <h3 class="nav-category-title m-0">{{ $subcatname->name ?? '' }}</h3>
                <ul class="list-group my-3">
                    @include('frontend.parentlist.sidemenu')
                </ul>
            </div>
        </div>

        <div class="col-md-9 pt-4">
            @foreach ($parent_categorys->chunk(4) as $chunk)
            <div class="row">
                @foreach ($chunk as $parent_category)

                    <div class="col-md-3 mt-2">
                        <a href="{{ route('website.listparents',$parent_category->id) }}">
                            <div class="card cursor-pointer">
                                <div class="category-product-list p-3">
                                    <img class="center-block" src="{{url('')}}/uploads/{{ $parent_category->icon }}" alt=""
                                        width="50%">
                                    <div class="text-center mt-3">{{ $parent_category->name }}</div>
                                </div>
                            </div>
                         </a>
                    </div>

                @endforeach
            </div>
            @endforeach






        </div>
    </div>
</div>









{{--

<div class="container">
    <div class="col-lg-3 col-sm-3 col-md-3 left">
        <ul class="list-group accordion flex-column">
           @foreach ($parent_categorys as $k=>$parent_category)
                <li class="list-group-item">
                    <a class="nav-link" href="#first{{$k}}" data-toggle="collapse" aria-expanded="false"
aria-controls="first">{{ $parent_category->name }}</a>
<div class="collapse" id="first{{$k}}">
    <ul class="nav flex-column ml-3" style="margin-left: 70px;">
        @foreach($parent_category->childcategories as $kk=>$child)
        <li class="nav-item"><a class="nav-link" href="#first{{$k}}{{$kk}}" data-toggle="collapse" aria-expanded="false"
                aria-controls="first" href="#">{{ $child->name }}</a>

            <div class="collapse" id="first{{$k}}{{$kk}}">
                <ul class="nav flex-column ml-3" style="margin-left: 70px;">
                    @foreach($child->products as $product)
                    <li class="nav-item"><a href="{{  route('website.productpartnumber', $product->id) }}"
                            class="nav-link">{{ $product->name }}</a>

                    </li>
                    @endforeach
                </ul>
            </div>

        </li>
        @endforeach
    </ul>
</div>
</li>
@endforeach
</ul>
</div>


<div class="col-md-9 col-lg-9 col-sm-9 right">
    @foreach ($parent_categorys as $parent_category)
    <div class="col-md-4 hover">
        <img class="center-block" src="{{url('')}}/uploads/{{ $parent_category->icon }}" alt="">
        <div class="text-center">{{ $parent_category->name }}</div>
    </div>

    @endforeach

</div>

</div> --}}


@endsection
