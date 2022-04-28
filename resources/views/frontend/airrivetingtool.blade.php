@extends('frontend.theme')
@section('content')
<div class="container py-5">
    <div class="clearfix">
        <h1 class="profile-title text-center">Air Riveting Tool</h1>
        <!-- <h1>product no 2</h1> -->
        <div class="row">
            <div class="col-md-6">
                <div class="container  ">
                    <div class="show" href="https://bestindiakart.com/pages/images/tool-11.jpg">
                        <img src="https://bestindiakart.com/pages/images/tool-10.jpg" id="show-img" />
                        <!-- <img src="https://bestindiakart.com/pages/images/tool-11.jpg" id="show-img" />
                        <img src="https://bestindiakart.com/pages/images/tool-12.jpg" id="show-img" /> -->
                    </div>
                    <div class="small-img">
                        <img src="images/online_icon_right@2x.png" class="icon-left" alt="" id="prev-img" />
                        <div class="small-container">
                            <div id="small-img-roll">
                                <img src="https://bestindiakart.com/pages/images/tool-10.jpg" class="show-small-img"
                                    alt="" />
                                <img src="https://bestindiakart.com/pages/images/tool-11.jpg" class="show-small-img"
                                    alt="" />
                                <img src="https://bestindiakart.com/pages/images/tool-12.jpg" class="show-small-img"
                                    alt="" />
                            </div>
                        </div>
                        <img src="images/online_icon_right@2x.png" class="icon-right" alt="" id="next-img" />
                    </div>
                </div>
                <h5 class="p-t-04">Product Description :</h5>
                <strong>Key Features:</strong>
                <ul class="list-unstyled">
                    <li>&#10004; Option heavy duty jaw for Avdel Monobolt.</li> <br>

                    <li> &#10004; Forging hydraulic section & hydraulic plunger with double O-ring to avoid oil leakage.
                    </li> <br>

                    <li> &#10004; Integrated vacuum mandrel collection system.</li> <br>

                    <li>&#10004; Adjustable vacuum regulator for the best efficiency in setting different size of blind
                        rivets.</li> <br>
                    <li> &#10004; 2 piece of ultra jaw for durability.</li> <br>
                    <li> &#10004; 250???Swivel air inlet for great maneuverability of the tool.</li> <br>
                    <li> &#10004; Rubber cushion for impact resistance and well protection.</li> <br>


                </ul>
            </div>
            <div class="col-md-6">

                <h5>Product Details:</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Minimum Order Quantity</th>
                            <td scope="col">2 Piece</td>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Model Name/Number</th>
                            <td>PR 2012</td>

                        </tr>
                        <tr>
                            <th scope="row">Brand</th>
                            <td>GRIP</td>

                        </tr>
                        <tr>
                            <th scope="row">Warranty</th>
                            <td scope="row">6 months</td>

                        </tr>
                        <tr>
                            <th scope="row">Air Consumption</th>
                            <td scope="row">5 to 6</td>

                        </tr>
                        <tr>
                            <th scope="row">Handle Type</th>
                            <td scope="row">Pistol</td>

                        </tr>
                        <tr>
                            <th scope="row">Air Pressure</th>
                            <td scope="row">50-100 psi</td>

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
                <h5>Additional Information</h5>
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
                </table>

                <button id="toogleEnquiry" class="btn btn-primary rounded"><i class="bi bi-telephone-fill"></i> Enquiry
                    Now</button>
                <button class="btn btn-primary rounded"><i class="bi bi-cart4"></i> ADD CART</button>

            </div>

        </div>
        <div id="enquiryForms" class="row">
            <h1 class="text-center">PRODUCT ENQUIRY FORM</h1>
            <p class="text-center">if your need product, fill the enquiry form below we will reply back to your asap!
            </p>
            <div class="col">
                <form id="quoteSubmit" action="enquiry-validation.php" method="post">
                    <div id="commonError" class="alert alert-danger text-center hide display-hide" role="alert">
                        Please fill all required fields
                    </div>
                    <div class="row contact-details">
                        <div class="col-sm-6 mb-xs">
                            <input class="gray_bg input_mr checkValidation" type="text" id="textarea" name="quotename"
                                placeholder="Full name" />
                            <div class="error text-left text-danger display-hide" id="quotenameError">
                                Please enter only Name
                            </div>
                        </div>
                    </div>
                    <div class="row contact-details">
                        <div class="col-sm-6 mb-xs">
                            <input class="gray_bg input_mr checkValidation" type="email" id="textarea" name="quoteemail"
                                placeholder="Your email" />
                            <div class="error text-left text-danger display-hide" id="emailError">
                                Please enter a valid Email
                            </div>
                        </div>
                    </div>

                    <div class="row contact-details">
                        <div class="col-sm-6 mb-xs">
                            <input class="gray_bg input_mr checkValidation" type="tel" maxlength="10" name="quotetel"
                                id="textarea" placeholder="Phone" />
                            <div class="error text-left text-danger display-hide" id="phoneNumberError">
                                Enter a valid Phone Number
                            </div>
                        </div>
                    </div>
                    <div class="row contact-details">
                        <div class="col-sm-6 mb-xs">
                            <input class="gray_bg input_mr checkValidation" type="text" maxlength="6"
                                name="quoteselect" id="textarea" value="Air Riveting Tool" readonly
                                placeholder="Zip code" />
                            <!-- <div class="error text-left text-danger display-hide" id="zipcodeError">
                                Please enter Zip Code
                            </div> -->
                        </div>
                    </div>
                    <div class="row contact-details">
                        <div class="col-sm-6 mb-xs">
                            <input class="gray_bg input_mr checkValidation" type="text" maxlength="6"
                                name="quotezipcode" id="textarea" placeholder="Required Qty" />
                            <div class="error text-left text-danger display-hide" id="zipcodeError">
                                Required Qty
                            </div>
                        </div>
                    </div>

                    <div class="row contact-details">
                        <div class="col-xs-12">
                            <textarea class="gray_bg" name="quotecontent" id="textarea" cols="30" rows="10"
                                placeholder="Write message"></textarea>
                        </div>
                        <div class="error text-danger display-hide" id="messageError">
                            Please Type a message.
                        </div>
                    </div>
                    <button type="submit" class="btn-orange">
                        Request a Quote Now
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
