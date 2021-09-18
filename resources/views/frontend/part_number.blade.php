@extends('frontend.theme')
@section('content')




<h2>Part number Page</h2>
<div class="container">
    <div class="row">
    <div class="col-md-3">
    <ul>
    @foreach($specification as $spec1)
            @foreach($spec1->specification as $spec2)
                   <label for="spec">{{  $spec2->name }}</label> <br>
                   @foreach($spec2->specificationTypes as $spec3)
                   <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1"> {{ $spec3->spec_type }}</label><br>

                   @endforeach

                   <br>
            @endforeach

    @endforeach
    </ul>
    </div>




        <div class="col-md-9">

                        @foreach($part_number as $part)
                        <div class="col-sm-4 col-md-3 box-product-outer">
                          <div class="box-product product_data">
                              <div class="img-wrapper">
                                  <a href="{{  route('website.part', $part->id) }}">
                                      <img width="50%" height="50%" alt="Product" src="{{url('')}}/uploads/{{ $part->icon }}">
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
                              <h6><a href="detail.html">{{ $part->part_number }}</a></h6>
                              <div class="price">
                                  <div>&#8377; <span class="price-down">{{ $part->original_price }}</span></div>
                                  <span class="price-old">&#8377; {{ $part->dash_price }}</span>
                              </div>

                              <input type="hidden" class="part_id" value="{{ $part->id }}">
                              <div class="qtySelector text-center">
                                <i class="fa fa-minus decreaseQty"></i>
                                <input type="text" class="qtyValue" value="1" />
                                <i class="fa fa-plus increaseQty"></i>
                              </div>
                              <button type="button" class="add-to-cart-btn btn btn-primary">Add to Cart</button>

                            </div>
                        </div>

                        @endforeach


        </div>
    </div>
</div>

<script>
var minVal = 1, maxVal = 20; // Set Max and Min values
// Increase product quantity on cart page
$(".increaseQty").on('click', function(){
		var $parentElm = $(this).parents(".qtySelector");
		$(this).addClass("clicked");
		setTimeout(function(){
			$(".clicked").removeClass("clicked");
		},100);
		var value = $parentElm.find(".qtyValue").val();
		if (value < maxVal) {
			value++;
		}
		$parentElm.find(".qtyValue").val(value);
});
// Decrease product quantity on cart page
$(".decreaseQty").on('click', function(){
		var $parentElm = $(this).parents(".qtySelector");
		$(this).addClass("clicked");
		setTimeout(function(){
			$(".clicked").removeClass("clicked");
		},100);
		var value = $parentElm.find(".qtyValue").val();
		if (value > 1) {
			value--;
		}
		$parentElm.find(".qtyValue").val(value);
	});


//add to cart

$(document).ready(function () {
        $('.add-to-cart-btn').click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('.product_data').find('.part_id').val();
            var quantity = $(this).closest('.product_data').find('.qtyValue').val();

            $.ajax({
                url:  "{{ route('add-to-cart') }}",
                method: "POST",
                data: {

                    'quantity': quantity,
                    'product_id': product_id,
                },
                success: function (response) {
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                },
            });
        });
    });




</script>

<style>
.qtySelector{
	border: 1px solid #ddd;
	width: 107px;
	height: 35px;
	margin: 10px auto 0;
}
.qtySelector .fa{
	padding: 10px 5px;
	width: 35px;
	height: 100%;
	float: left;
	cursor: pointer;
}
.qtySelector .fa.clicked{
	font-size: 12px;
	padding: 12px 5px;
}
.qtySelector .fa-minus{
	border-right: 1px solid #ddd;
}
.qtySelector .fa-plus{
	border-left: 1px solid #ddd;
}
.qtySelector .qtyValue{
	border: none;
	padding: 5px;
	width: 35px;
	height: 100%;
	float: left;
	text-align: center
}

</style>

@endsection
