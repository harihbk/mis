@extends('frontend.theme')
@section('content')

{{ Breadcrumbs::render('products',$pc) }}

<div class="container">
    <div class="my-3">
        <div class="row">
            <div class="col-md-6">
                <h3 class="nav-category-title">{{ $childcategory->name ?? '' }}</h3>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" id="0" class="btn btn-primary product_id btn-sm">See All</button>
            </div>
        </div>
    </div>
    <div class="row mt-4 mb-3">
        @foreach ($products as $product)
        <div class="col-md-3 product_list">
            <div class="card">
                <div class="child-product-card p-3">
                    <a href="#" class="product_id" id="{{ $product->id }}">
                        <img class="center-block" src="{{url('')}}/uploads/{{ $product->image }}" alt="" width="50%">
                        <div class="text-center">{{ $product->name }}</div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-md-3">

        @include('frontend.parentlist.filters')

    </div>
    <div class="col-md-8">
        @include('frontend.parentlist.datatables')
    </div>
</div>
<style>
.product_list {
    display: flex
}
.product {
    width: 17%;
}
.product:hover {
    border: 1px solid #8580e0;
}
</style>
<script>
//datatables
$(function() {
    var currenturl = "{{ Route::currentRouteAction() }}";
     url = currenturl.split('@')[1];
     if(url == "listparents"){
      url =  "{{ route('website.listparents', request()->route('childategory_id') ) }}"
     } else {
       url =  "{{ route('website.products', request()->route('childategory_id') ) }}"
     }


    $(".spec_type").click(function(){

        var searchIDs = $(".spec_type:checked").map(function(){
          return $(this).val();
        }).toArray();
        $('.data-table').DataTable().destroy();
        datatables(null,searchIDs);
    })


    datatables(null,null);
    $(".product_id").click(function() {
        var p_id = $(this).attr('id')
        $('.data-table').DataTable().destroy();
        datatables(p_id,null);
    })






    function datatables(p_id,searchIDs) {
        table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: url,
                type: 'GET',
                data: function(d) {
                    d.prod_id = p_id;
                    d.spec_type = searchIDs
                }
            },

            columns: [{
                    data: 'img',
                    name: 'img'
                },
                {
                    data: 'part_number',
                    name: 'part_number'
                },
                {
                    data: 'nominal_thread_m',
                    name: 'nominal_thread_m'
                },
                {
                    data: 'nominal_thread_inch',
                    name: 'nominal_thread_inch'
                },
                {
                    data: 'product_length',
                    name: 'product_length'
                },
                {
                    data: 'mounting_hole_shape',
                    name: 'mounting_hole_shape'
                },
                {
                    data: 'material',
                    name: 'material'
                },
                {
                    data: 'quantity',
                    name: 'quantity'
                },
                // {data: 'email', name: 'email'},
                // {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    }

});
</script>
@endsection
