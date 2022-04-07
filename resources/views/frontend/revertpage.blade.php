@extends('frontend.theme')
@section('content')



<div class="container py-5">
    <div class="clearfix">
        <h1 class="profile-title text-center">{{ $data->name }}</h1>
        <!-- <h1>product no 2</h1> -->
        <div class="row">
            <div class="col-md-6">
                <div class="container  ">
                    <div class="show" href="https://bestindiakart.com/pages/images/br-2720.jpg">
                        <img src="{{url('/uploads/')}}/{{ $data->icon ?? '' }}" id="show-img" />

                    </div>
                    <div class="small-img">
                        <img src="images/online_icon_right@2x.png" class="icon-left" alt="" id="prev-img" />
                        <div class="small-container">
                            <div id="small-img-roll">
                                <?php
                                    $variable = explode("|",$data->images);
                                            foreach ($variable as $key => $value) {
                                                ?>
                                            <img src="{{url('/image/')}}/{{ $value ?? '' }}" alt="" class="show-small-img"/>

                                                <?php
                                            }
                                    ?>

                            </div>
                        </div>
                        <img src="images/online_icon_right@2x.png" class="icon-right" alt="" id="next-img" />
                    </div>
                </div>
                <!-- <h5 class="p-t-04">Product Description :</h5>
                <strong>Key Features:</strong> -->
                <!-- <ul class="list-unstyled">
                    <li>&#10004; Option heavy duty jaw for Avdel Monobolt.</li> <br>

                    <li> &#10004; Forging hydraulic section & hydraulic plunger with double O-ring to avoid oil leakage.
                    </li> <br>

                    <li> &#10004; Integrated vacuum mandrel collection system.</li> <br>

                    <li>&#10004; Adjustable vacuum regulator for the best efficiency in setting different size of blind
                        rivets.</li> <br>
                    <li> &#10004; 2 piece of ultra jaw for durability.</li> <br>
                    <li> &#10004; 250???Swivel air inlet for great maneuverability of the tool.</li> <br>
                    <li> &#10004; Rubber cushion for impact resistance and well protection.</li> <br>


                </ul> -->
            </div>
            <div class="col-md-6">

                <h5>Product Details:</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">weight</th>
                            <td scope="col">2.1kg</td>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Motor</th>
                            <td>20v DC motor</td>

                        </tr>
                        <tr>
                            <th scope="row">Maximum Stroke</th>
                            <td>27mm</td>

                        </tr>
                        <tr>
                            <th scope="row">Charging Time</th>
                            <td scope="row">
                                <=60mins< /td>

                        </tr>
                        <tr>
                            <th scope="row">Drawing Force</th>
                            <td scope="row">20000N</td>

                        </tr>
                        <tr>
                            <th scope="row">Battery Type</th>
                            <td scope="row">li-on Battery</td>

                        </tr>
                        <tr>
                            <th scope="row">Input Voltage</th>
                            <td scope="row">100-240V /50-60hz</td>

                        </tr>
                        <tr>
                            <th scope="row">Air Inlet</th>
                            <td scope="row">1/4"</td>

                        </tr>
                        <tr>
                            <th scope="row">Rivet Diameter</th>
                            <td scope="row">5/32", 3/16"</td>

                        </tr>
                        <tr>
                            <th scope="row">Part Number</th>
                            <td scope="row">PR 2012</td>

                        </tr>
                        <tr>
                            <th scope="row">Stroke Length</th>
                            <td scope="row">20</td>

                        </tr>
                        <!-- <tr>
                            <th scope="row">Weight</th>
                            <td scope="row">2.28kg</td>

                        </tr> -->
                        <!-- <tr>
                            <th scope="row"> Stroke Length</th>
                            <td scope="row">26mm</td>

                        </tr> -->

                    </tbody>
                </table>
                <!-- <h5>Additional Information</h5>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Delivery Time</th>
                            <td scope="row">2-4 week</td>

                        </tr>
                        <tr>
                            <th scope="row">Packaging Details</th>
                            <td scope="row">special packaging boxes</td>

                        </tr>
                    </tbody>
                </table> -->
                <!-- <div>
                <button  class="btn btn-primary rounded"><i class="bi bi-telephone-fill"></i>  Enquiry Now</button>
                <button class="btn btn-primary rounded"><i class="bi bi-cart4"></i> ADD CART</button>
                </div> -->
                <button id="toogleEnquiry" class="btn btn-primary rounded"><i class="bi bi-telephone-fill"></i> Enquiry
                    Now</button>
                <button class="btn btn-primary rounded"><i class="bi bi-cart4"></i> ADD CART</button>

                <!-- <a href="./enquiry-form.php" target="_parent">Enquiry Now</a> -->
            </div>
        </div>

    </div>
</div>

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


<style>

.profile-info-wrapper {
  display: flex;
}

.profile-name-bg {
  flex-grow: 1;
  display: flex;
  text-align: right;
  margin-left: 16px;
  padding-right: 16px;
  align-items: center;
  background: #e6e6e6;
  justify-content: flex-end;
  border: 1px solid #dedede;
}

.profile-avator {
  width: 150px;
  height: 150px;
  object-fit: cover;
}
.padding{
  padding: 25px;
}
.profile-title,
.profile-name {
  color: #1450bf;
  font-weight: 700;
  font-size: 24px;
}

.profile-name {
  font-size: 20px;
  padding: 0 8px;
  margin-top: -2px;
}

.btn-change-profile {
    width: 150px;
    margin: 8px 0;
}

/* ----- Product Section ----- */
.product {
  display: grid;
  grid-template-columns: 0.9fr 1fr;
  margin: auto;
  padding: 2.5em 0;
  min-width: 600px;
  background-color: white;
  border-radius: 5px;
}
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box
}
.show{
  width: 400px;
  height: 400px;
}
#show-img { width: 400px; height: 400px; }
.small-img{
  width: 350px;
  height: 70px;
  margin-top: 10px;
  position: relative;
  left: 25px;
}
.small-img .icon-left, .small-img .icon-right{
  width: 12px;
  height: 24px;
  cursor: pointer;
  position: absolute;
  top: 0;
  bottom: 0;
  margin: auto 0;
}
.small-img .icon-left{
  transform: rotate(180deg)
}
.small-img .icon-right{
  right: 0;
}
.small-img .icon-left:hover, .small-img .icon-right:hover{
  opacity: .5;
}
.p-t-04{
  /* padding-top: 147px; */
  padding: 25px;
}
.small-container{
  width: 310px;
  height: 70px;
  overflow: hidden;
  position: absolute;
  left: 0;
  right: 0;
  margin: 0 auto;
}
.small-container div{
  width: 800%;
  position: relative;
}

.small-container .show-small-img{
  width: 70px;
  height: 70px;
  margin-right: 6px;
  cursor: pointer;
  float: left;
}
.small-container .show-small-img:last-of-type{
  margin-right: 0;
}
@media screen and (max-width: 440px) {
  .col-md-6 {
    padding: 25px;
  }
}
.contact-details {
  border: none !important;
  width: 100% !important;
  background: #eef3f9;
  font-size: 14px;
  font-weight: 500;
  margin-top: 16px;
  padding: 25px 30px !important;
  margin-top: 16px !important;
  margin-left: 2px !important;
  margin-right: 16px !important;
}

.btn-orange {
  background: #1b4ca3;
  color: #ffffff;
  padding: 16px 25px !important;
  display: inline-block;
  text-decoration: none;
  font-weight: 700;
  border: none;
  margin-top: 16px;
}
.btn-orange:hover {
  background: #f04b25;
  color: #ffffff;
  padding: 16px 25px !important;
  display: inline-block;
  text-decoration: none;
  font-weight: 700;
  border: none;
  margin-top: 16px;
  transition: all 0.6s ease-in-out;
  -webkit-transition: all 0.6s ease-in-out;
  -moz-transition: all 0.6s ease-in-out;
  -ms-transition: all 0.6s ease-in-out;
  -o-transition: all 0.6s ease-in-out;
}
.display-hide {
  display: none;
}
.contact-details select,
.contact-details textarea::placeholder {
  color: #000;
  width: 100%;
  border: none;
  background: #eef3f9;
}
#textarea {
  resize: vertical;
  width: 100%;
  border: none;
  background: #eef3f9;
  color: rgb(83, 76, 76);
}

</style>

@endsection
