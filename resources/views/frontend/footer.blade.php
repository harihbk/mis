<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class="img-fluid footer-logo" src="{{ URL::to('/') }}/images/footer-logo.png" alt="footer">
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
                    <a href="https://bestindiakart.com/pages/about-us.php">About us</a>
                    <a href="https://bestindiakart.com/pages/shipping-policy.php">Shipping Policy</a>
                    <a href="https://bestindiakart.com/pages/refunds-and-cancellations-policy.php">Refunds & Cancellations</a>

                    <a href="https://bestindiakart.com/pages/privacy-policy.php">Privacy Policy</a>
                    <a href="https://bestindiakart.com/pages/terms-and-conditions.php">Terms of Conditions</a>
                    <a href="#">Blogs</a>
                    <a href="https://bestindiakart.com/pages/contact-us.php">Contact Us</a>
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








    (function(){
        var page = 2;
        jQuery(".more_product").click(function(){
            $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            }
	        })
	        .done(function(data)
	        {

	            if(data.html == " "){
	                $('.ajax-load').html("No more records found");
	                return;
	            }
	            $('.ajax-load').hide();
	            $(".list-group").append(data.html);
	        })
	        .fail(function(jqXHR, ajaxOptions, thrownError)
	        {
	              alert('server not responding...');
	        });
            page++;
        })


     })();



// autocomplete

     var path = "{{ route('orderuserview') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {

                return process(data);
            });
        }, updater: function (query_s) {
          //  partnumber/14
          p = "<?=url('/')?>";

            window.location.href = p+"/website/partnumber/"+query_s.id;
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
</body>
</html>
