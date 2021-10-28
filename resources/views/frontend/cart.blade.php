@extends('frontend.theme')

@section('content')

<section class="bg-success">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2 py-3">
                <h5><a href="/" class="text-dark">Home</a> › Cart</h5>
            </div>
        </div>
    </div>
</section>





<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(isset($cart_data))

                        @php $total="0" @endphp
                        <div class="shopping-cart">
                            <div class="shopping-cart-table">
                                <div class="table-responsive">
                                    <div class="col-md-12 text-right mb-3">
                                        <a href="javascript:void(0)" class="clear_cart font-weight-bold">Clear Cart</a>
                                    </div>
                                    <table class="table table-bordered my-auto  text-center">
                                        <thead>
                                            <tr>
                                                <th class="cart-description">Image</th>
                                                <th class="cart-product-name">Product Name</th>
                                                <th class="cart-price">SQB</th>
                                                <th class="cart-price">Price</th>
                                                <th class="cart-qty">Quantity</th>
                                                <th class="cart-total">Total</th>
                                                <th class="cart-romove">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody class="my-auto">
                                            @foreach ($cart_data as $data)


                                            <tr class="cartpage cartpage" id="{{ $data['id'] }}">

                                                <td class="cart-image">
                                                    <input type="hidden" class="product_id" value="{{ $data->id ?? '' }}" >

                                                    <a class="entry-thumbnail" href="javascript:void(0)">
                                                        <img src="{{url('')}}/uploads/{{ $data->associatedModel->icon ?? '' }}"  width="70px" alt="">
                                                    </a>
                                                </td>


                                                <td class="cart-product-name-info">
                                                    <h4 class='cart-product-description'>
                                                        <a href="javascript:void(0)">{{ $data->name ?? '' }}</a>
                                                    </h4>
                                                </td>

                                                <td>
                                                    <span class="cart-sub-total-price">{{ $data->associatedModel->weight->description ?? '' }}</span>
                                                </td>

                                                <td class="cart-product-sub-total">
                                                    <span class="cart-sub-total-price">{{ $data->price ?? '' }}</span>
                                                </td>


                                                <td class="cart-product-quantity" width="130px">
                                                    <div class="input-group quantity">
                                                        <div class="input-group-prepend decrement-btn changeQuantity" style="cursor: pointer">
                                                            <span class="input-group-text">-</span>
                                                        </div>
                                                        <input type="text" class="qty-input form-control" step="{{ $data->associatedModel->step == 0 ? 1 : $data->associatedModel->step }}" minlength="{{ $data->associatedModel->minimum }}" maxlength="{{ $data->associatedModel->maximum }}" max="{{ $data['quantity'] }}" value="{{ $data->quantity ?? '' }}">
                                                        <div class="input-group-append increment-btn changeQuantity" style="cursor: pointer">
                                                            <span class="input-group-text">+</span>
                                                        </div>
                                                    </div>
                                                </td>




                                                {{-- <td class="cart-product-quantity">
                                                     <input type="number" class="qty-input form-control" value="{{ $data['item_quantity'] }}" min="1" max="100"/>
                                                </td> --}}
                                                <td class="cart-product-grand-total">
                                                    @if (isset($data->associatedModel->weight->name))
                                                    <span class="cart-grand-total-price">{{ $data->quantity * $data->price * $data->associatedModel->weight->name }}</span>
                                                    @else
                                                    <span class="cart-grand-total-price">{{ $data->quantity * $data->price * 0 }}</span>
                                                    @endif

                                                </td>
                                                <td style="font-size: 20px;">
                                                    <button type="button" class="delete_cart_data"><li class="fa fa-trash-o"></li> Delete</button>
                                                </td>
                                                @if (isset($data->associatedModel->weight->name))
                                                @php $total = $total + ($data->quantity  * $data->price * $data->associatedModel->weight->name) @endphp
                                                @else
                                                @php $total = $total + ($data->quantity  * $data->price * 0) @endphp
                                                @endif

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table><!-- /table -->
                                </div>
                            </div><!-- /.shopping-cart-table -->
                            <div class="row">

                                <div class="col-md-8 col-sm-12 estimate-ship-tax">
                                    <div>
                                        <a href="{{ url('website') }}" class="btn btn-upper btn-warning outer-left-xs">Continue Shopping</a>
                                    </div>
                                </div><!-- /.estimate-ship-tax -->


                                @include('frontend.cart_total')


                            </div>

                        </div><!-- /.shopping-cart -->

                @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h4>Your cart is currently empty.</h4>
                                <a href="{{ url('website') }}" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div> <!-- /.row -->
    </div><!-- /.container -->
</section>


<script>
    // Clear Cart Data
    $(document).ready(function () {

$('.clear_cart').click(function (e) {
    e.preventDefault();

    $.ajax({
        url:"{{ route('clear-cart') }}",
        type: 'GET',
        success: function (response) {
            window.location.reload();
            alertify.set('notifier','position','top-right');
            alertify.success(response.status);
        }
    });

});


$('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
           // var value = parseInt(incre_value, 10);
           // value = isNaN(value) ? 0 : value;
            if($(this).parents('.quantity').find('.qty-input').attr("step") > 0){
               value =  parseInt(incre_value)+parseInt($(this).parents('.quantity').find('.qty-input').attr("step"));
            } else {
                value++;
            }
                $(this).parents('.quantity').find('.qty-input').val(value);

        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var minm_val = $(this).parents('.quantity').find('.qty-input').attr('minlength');
            var step = $(this).parents('.quantity').find('.qty-input').attr("step") ;
           // var value = parseInt(decre_value, 10);

           if($(this).parents('.quantity').find('.qty-input').attr("step") > 0){
               value =  parseInt(decre_value)-parseInt($(this).parents('.quantity').find('.qty-input').attr("step"));
            } else {
                value--;
            }

            value = isNaN(value) ? 0 : value;
            if(value>1){
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });




$('.changeQuantity').click(function (e) {
            e.preventDefault();

            var quantity = $(this).closest(".cartpage").find('.qty-input').val();
            var product_id = $(this).closest(".cartpage").find('.product_id').val();

            var data = {
                '_token': $('input[name=_token]').val(),
                'quantity':quantity,
                'product_id':product_id,
            };

            $.ajax({
                url: '{{ route("update-to-cart") }}',
                type: 'POST',
                data: data,
                success: function (response) {

                   window.location.reload();
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });
        });


        $('.delete_cart_data').click(function (e) {
            e.preventDefault();

            var product_id = $(this).closest(".cartpage").find('.product_id').val();

            var data = {
                '_token': $('input[name=_token]').val(),
                "product_id": product_id,
            };

            // $(this).closest(".cartpage").remove();

            $.ajax({
                url: '{{ route("delete-from-cart") }}',
                type: 'DELETE',
                data: data,
                success: function (response) {
                    window.location.reload();
                }
            });
        });


});
</script>

@endsection



