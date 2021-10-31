@extends('frontend.theme')
@section('content')

<div class="container">

    <div id="content" class="col-sm-9">
        <h2>My Wish List</h2>
        @if ( !$wishlist)
        <h2 class="text-center">No Wish List Found</h2>
        @else


              <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <td class="text-center">Image</td>
                <td class="text-left">Product Name</td>
                <td class="text-left">SQB</td>
                <td class="text-right">Price</td>

                <td class="text-right">Action</td>
              </tr>
            </thead>
            <tbody>

               @foreach ($wishlist as $item)
               <tr>
                <td class="text-center"><img src="{{ url('')."/uploads/$item->icon" }}" >
                <input type="hidden" value="{{ $item->id }}" class="product_id">
                </td>
                <td class="text-left"><a href="https://snappshoppy.com/index.php?route=product/product&amp;product_id=64">{{ $item->part_number }}</a></td>
                <td class="text-left">{{ $item->weight->description }}</td>
                <td class="text-left">{{ $item->original_price ?? '' }}</td>
                <td class="text-right">
                    <button type="button"  data-toggle="tooltip" title="" class="btn btn-primary add-to-cart-btn" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
                 <button type="button" class="btn btn-danger remove_wishlist"><i class="fa fa-times"></i></button>
                </td>


               </tr>

                @endforeach

                        </tbody>

          </table>
        </div>

        @endif


              <div class="buttons clearfix">
          <div class="pull-right"><a href="{{ route('home') }}" class="btn btn-primary">Continue</a></div>
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
                jQuery('.basket-item-count').append(jQuery('<span class="badge badge-pill red">' + value[
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


            $.ajax({
                url: "{{ route('unwish') }}",
                method: "POST",
                data: {

                    'product_id': product_id,
                },
                success: function (response) {

                    alertify.set('notifier','position','top-right');
                    alertify.success(`${response.status} Removed from Wishlist`);
                    $(this).closest('tr').hide();
                },
            });

})



    });

</script>
@endsection