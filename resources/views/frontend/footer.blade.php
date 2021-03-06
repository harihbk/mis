<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class="img-fluid footer-logo" src="{{ URL::to('/') }}/images/footer-logo.png" alt="footer">
                <div class="row">
                    <div class="col ">
                      <a href="https://www.facebook.com/digitalbestindiakart"><i class="fa fa-facebook-square social-media-footer " aria-hidden="true"></i></a>
                      <a href="https://www.youtube.com/channel/UCZLr4j4RP73pi0pepBm5jEg"><i class="fa fa-youtube-play social-media-footer " aria-hidden="true"></i></a>
                      <a href="https://www.instagram.com/bestindiakart02/"><i class="fa fa-instagram social-media-footer " aria-hidden="true"></i></a>
                      <a href=""><i class="fa fa-linkedin social-media-footer " aria-hidden="true"></i></a>
                      <a href="https://twitter.com/bestindiakart"><i class="fa fa-twitter social-media-footer " aria-hidden="true"></i></a>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2>Customer Service</h2>
                <div class="footer-link-list">
                    <a href="#">Register</a>
                    <a href="#">How to Use</a>
                    <a href="#">Catalog Request</a>
                    <a href="#">Inquiry</a>
                    <a href="#">Sitemap</a>
                </div>
            </div>
            <div class="col-md-3">
                <h2>My Account</h2>
                <div class="footer-link-list">
                    <a href="#">Request a Quote</a>
                    <a href="#">My Quote/Order History</a>
                    <a href="#">Cart</a>
                    <a href="#">My Page</a>
                </div>
            </div>
            <div class="col-md-3">
                <h2>About Best Inidakart</h2>
                <div class="footer-link-list">
                    <a href="{{ route('aboutus')}}">About us</a>
                    <a href="{{ route('shippingypolicy')}}">Shipping Policy</a>
                    <a href="{{ route('refundscancellations')}}">Refunds & Cancellations</a>

                    <a href="{{ route('privacypolicy')}}">Privacy Policy</a>
                    <a href="{{ route('termsandconditions')}}">Terms of Conditions</a>
                    <a href="#">Blogs</a>
                    <a href="{{ route('contactus')}}">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="d-flex align-items-center hei100Per">
                    <div>
                        Copyright &copy; <span id="footerCurrentYear"></span> BEST INDIAKART All Rights Reserved.
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="d-flex align-items-center hei100Per">
                    Design &amp; Developed by <a class="link-text-white" href="#">WEBDADS2U</a>
                </div>
            </div>
            <div class="col-md-4">
                <div>We Accept the Major Cards</div>
                <div class="footer-cards-wrapper">
                    <img src="{{ URL::to('/') }}/images/cards.jpg" alt="cards">
                </div>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" id="hs-script-loader" async defer src="//js-na1.hs-scripts.com/21753606.js"></script>
<script>
    const getDate = new Date();
    const currentYear = getDate.getFullYear();
    document.getElementById('footerCurrentYear').innerHTML = currentYear;

    var path = window.location.pathname;
    var page = path.split("/").pop();
    console.log(page);
    if (page === 'home.php') {
        jQuery('.breadcrumb').hide();
    }
</script>




<script>
    jQuery(document).ready(function() {

        cartload();
    });

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

                //                 var parsed = jQuery.parseJSON(response)
                // console.log(parsed);
                //                 if(parsed.cartdata){


                //                     Object.values(parsed.cartdata).forEach(element => {
                //                         $(`.prod_id_${element.item_id}`).val(element.item_quantity)
                //                            console.log(`.prod_id_${element.item_id}`)
                //                     });
                //                 }



                jQuery('.basket-item-count').html('');

                //  var value = parsed; //Single Data Viewing
                jQuery('.basket-item-count').append(jQuery('<span class="badge badge-pill badge-primary">' + response?.totalcart + '</span>'));
            }
        });
    }








    (function() {
        var page = 2;
        jQuery(".more_product").click(function() {
            $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: function() {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data) {

                    if (data.html == " ") {
                        $('.ajax-load').html("No more records found");
                        return;
                    }
                    $('.ajax-load').hide();
                    $(".list-group").append(data.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('server not responding...');
                });
            page++;
        })


    })();



    // autocomplete

    var path = "{{ route('orderuserview') }}";
    $('input.typeahead').typeahead({
        source: function(query, process) {
            return $.get(path, {
                query: query
            }, function(data) {

                return process(data);
            });
        },
        updater: function(query_s) {
            //  partnumber/14
            p = "<?= url('/') ?>";

            window.location.href = p + "/website/partnumber/" + query_s.id;
        }
    });



    //     $(document).ready(function() {
    //     $( "#autocompletename" ).autocomplete({

    //         source: function(request, response) {
    //             $.ajax({
    //             url:"{{ route('orderuserview') }}",
    //             data: {
    //                     term : request.term
    //              },
    //             dataType: "json",
    //             success: function(data){
    //                var resp = $.map(data,function(obj){
    //                     return obj.name;
    //                });

    //                response(resp);
    //             }
    //         });
    //     },
    //     minLength: 2
    //  });
    // });



    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery.ajax({
        url: "{{ route('countwhistlist') }}",
        method: "GET",
        success: function(response) {

            // jQuery('.basket-item-count').html('');

            jQuery('span.whistlistcount').text(response);
        }
    });
</script>
<!-- custom pages images and tooltip -->
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $(".side-nav .collapse").on("hide.bs.collapse", function() {
            $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
        });
        $('.side-nav .collapse').on("show.bs.collapse", function() {
            $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
        });
        $("#toogleEnquiry").click(function() {
            $("#enquiryForms").toggle();
        });

    })
</script>
</body>

</html>