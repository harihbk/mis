@extends('frontend.theme')
@section('content')


<div class="d-md-flex h-md-100 align-items-center">

    <!-- First Half -->
    <div class="col-md-3 p-0 bg-indigo h-md-100">
        <div class="text-white d-md-flex align-items-center h-100 p-5 text-center justify-content-center">
            <div class="logoarea pt-5 pb-5">


                <div class="w-25 p-3" style="background-color: #eee;">

              <?php?>



                </div>



            </div>
        </div>
    </div>

    <!-- Second Half -->
    <div class="col-md-9 p-0 bg-white h-md-100 loginarea">
        <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">
            Second half content here
        </div>
    </div>

</div>



{{--
<div class="container">
    <div class="row">
        <div class="col-md-9 pt-3">

                        @foreach($products as $product)
                        <div class="col-sm-4 col-md-3 box-product-outer">
                          <div class="box-product">
                              <div class="img-wrapper">
                                  <a href="{{  route('website.part', $product->id) }}">
                                      <img alt="Product" src="{{url('')}}/uploads/{{ $product->image }}">
                                  </a>
                                  <div class="tags">
                                      <span class="label-tags"><span class="label label-danger">Sale</span></span>
                                      <span class="label-tags"><span class="label label-info">Featured</span></span>
                                      <span class="label-tags"><span class="label label-warning">Polo</span></span>
                                  </div>
                                  <div class="option">
                                      <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                                      <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                                      <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                                  </div>
                              </div>
                              <h6><a href="detail.html">{{ $product->name }}</a></h6>
                              <div class="price">
                                  <div>$16.59<span class="price-down">-10%</span></div>
                                  <span class="price-old">$15.00</span>
                              </div>
                          </div>
                        </div>
                        @endforeach


        </div>
    </div>
</div> --}}















<style>
body{margin-top:20px;}
.box-product-outer {
    margin-bottom: 5px;
    padding-top: 15px;
    padding-bottom: 15px
}
.box-product-outer:hover {
    outline: 1px solid #aaa;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175)
}
.tab-content .box-product-outer { margin-bottom: 0 }
.box-product-slider-outer { padding: 10px }
.box-product .img-wrapper {
    position: relative;
    overflow: hidden
}
.box-product .img-wrapper > :first-child {
    position: relative;
    display: block
}
.box-product .img-wrapper > a > img { width: 100% }
.box-product .img-wrapper .tags {
    position: absolute;
    top: 0;
    right: 0;
    display: inline-block;
    overflow: visible;
    width: auto;
    height: auto;
    margin: 0;
    padding: 0;
    vertical-align: inherit;
    border-width: 0;
    background-color: transparent;
    direction: rtl
}
.box-product .img-wrapper .tags-left {
    left: 0;
	direction: ltr
}
.box-product .img-wrapper .tags > .label-tags {
    display: table;
    margin: 1px 0 0 0;
    text-align: left;
    opacity: .92;
    filter: alpha(opacity=92);
    direction: ltr
}
.box-product .img-wrapper .tags > .label-tags:hover {
    opacity: 1;
    filter: alpha(opacity=100)
}
.box-product .img-wrapper .tags > .label-tags a:hover { text-decoration: none }
.box-product .img-wrapper > .option {
    position: absolute;
    top: auto;
    right: 0;
    bottom: -30px;
    left: 0;
    width: auto;
    height: 28px;
    -webkit-transition: all .2s ease;
         -o-transition: all .2s ease;
            transition: all .2s ease;
    text-align: center;
    vertical-align: middle;
    background-color: rgba(0, 0, 0, .55)
}
.box-product .img-wrapper .option > a {
    font-size: 18px;
    font-weight: normal;
    display: inline-block;
    padding: 0 4px;
    color: #fff
}
.box-product .img-wrapper:hover > .option {
    top: auto;
    bottom: 0
}
.box-product h6 a { line-height: 1.4 }
.price {
    margin-bottom: 5px;
    color: #f44336
}
.price .price-down {
    margin-left: 5px;
    padding: 2px 5px;
    color: #fff;
    background: #f44336
}
.price-old {
    position: relative;
    display: inline-block;
    margin-right: 7px;
    color: #666
}
.price-old:before {
    position: absolute;
    width: 100%;
    height: 60%;
    content: '';
    border-bottom: 1px solid #666
}
.rating i { color: #fc0 }
.product-sorting-bar { border: 1px solid #e5e5e5 }
</style>


@endsection
