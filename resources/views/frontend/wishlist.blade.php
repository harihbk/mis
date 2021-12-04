@extends('frontend.theme')
@section('content')
<div class="container py-4">
    <h2>My Wish List</h2>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div id="content" class="col-sm-12 py-4">
                    @if ( !$wishlist)
                    <h2 class="text-center">No Wish List Found</h2>
                    @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>SQB</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $item)
                                <tr>
                                    <td class="text-center"><img src="{{ url('/uploads/'.$item->icon) }}" width="50"
                                        height="50">
                                        <input type="hidden" value="{{ $item->id ?? '' }}" class="product_id">
                                    </td>
                                    <td class="text-left"><a href="{{ route('website.partnumberpage',$item->id) }}">{{
                                            $item->part_number ?? '' }}</a></td>
                                    <td class="text-left">{{ $item->weight->description ?? '' }}</td>
                                    <td class="text-left">{{ $item->original_price ?? '' }}</td>
                                    <td class="text-right">
                                        <button type="button" data-toggle="tooltip" title=""
                                            class="btn btn-primary add-to-cart-btn" data-original-title="Add to Cart"><i
                                                class="fa fa-shopping-cart"></i></button>
                                        <button type="button" class="btn btn-danger remove_wishlist"><i
                                                class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="buttons clearfix">
                        <div class="pull-right"><a href="{{ route('home') }}" class="btn btn-primary">Continue</a></div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.add-to-cart-btn').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('tr').find('.product_id').val();
            var quantity =1;

            $.ajax({
                url: "{{ route('add-to-cart') }}",
                method: "POST",
                data: {
                    'quantity': quantity,
                    'product_id': product_id,
                },
                success: function (response) {
                    cartload()
                    $('span > .badge-pill').html(response.count);
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                },
            });

        });



// load cart data


function cartload() {
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "{{ route('load-cart-data') }}",
            method: "GET",
            success: function(response) {
                var parsed = jQuery.parseJSON(response)
                if(parsed.cartdata){
                    parsed.cartdata.forEach(element => {
                        $(`.prod_id_${element.item_id}`).val(element.item_quantity)
                           console.log(`.prod_id_${element.item_id}`)
                    });
                }

                jQuery('.basket-item-count').html('');

                var value = parsed; //Single Data Viewing
                jQuery('.basket-item-count').append(jQuery('<span class="badge badge-pill badge-primary">' + value[
                    'totalcart'] + '</span>'));
            }
        });
    }



$('.remove_wishlist').click(function(e){

    e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('tr').find('.product_id').val();
            $(this).closest('tr').hide();

            $.ajax({
                url: "{{ route('unwish') }}",
                method: "POST",
                async : false,
                data: {
                    'product_id': product_id,
                },
                success: function (response) {


                    jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "{{ route('countwhistlist') }}",
            method: "GET",
            success: function(response) {
                jQuery('span.whistlistcount').text(response);
            }
        });



                    alertify.set('notifier','position','top-right');
                    alertify.success(`${response.status} Removed from Wishlist`);

                },
            });

})



    });

</script>
@endsection
