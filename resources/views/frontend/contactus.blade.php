@extends('frontend.theme')
@section('content')
<div class="container py-3">
    <div class="clearfix">
        <div>
            <h1 class="profile-title text-center">CONTACT US</h1>
            <h5>CONTACTING BESTINDIAKART.COM</h5>
            <p>We are committed to conducting our business in accordance with these principles in order to ensure that
                the
                confidentiality of personal information is protected and maintained. If you have any questions about the
                way
                in which your information is being collected or used which
                are not answered by this Privacy Statement and/or any complaints please contact us at <a
                    href="mailto: marketing@bumaas.com">marketing@bumaas.com</a>
            </p>
            <strong>Alternatively you can contact us + 91 44 4421 8147 if you have any queries in relation to
                your data. Our offices are open Monday through Frday Or all of the ways!
            </strong> <br>
        </div>
        <br>

        <div class="container">
        <div class="row ">
            <div class="col-4">
                <div class="card text-center  shadow-lg pb-3  mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title"> <i class="bi bi-envelope-fill"></i></h5>
                        <p class="card-text text-primary"><strong>Contact Email : </strong></p>
                        <a href="mailto:marketing@bumaas.com">marketing@bumaas.com</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card text-center  shadow-lg pb-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title"> <i class="bi bi-telephone-fill "></i></h5>
                        <p class="card-text text-primary"><strong>Contact mobile :</strong></p>
                        <p class="card-text"><strong>+91 7812810488 </strong></p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card text-center  shadow-lg   bg-body rounded">
                    <div class="card-body">
                        <h5 class="card-title"> <i class="bi bi-geo-alt-fill"></i></h5>
                        <p class="card-text text-primary"><strong>Our Address </strong></p>
                        <p class="card-text"><strong>No 1A, Jeevarathinam Street, KSR Nagar , Ambattur -600053</strong>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>


        <div class="row">
            <div class="col-lg-6 ">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3885.9462775412626!2d80.15385591744382!3d13.102589900000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5263555fa80469%3A0x43ec3e196a1b8a20!2sBumaas%20Engineering%20Solutions%20%26%20Technologies%20Private%20Limited!5e0!3m2!1sen!2sin!4v1647425587209!5m2!1sen!2sin"
                    width="100%" height="384" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-lg-6">
                <form id="quoteSubmit" action="mail-validation.php" method="post">
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
                                name="quotezipcode" id="textarea" placeholder="Zip code" />
                            <div class="error text-left text-danger display-hide" id="zipcodeError">
                                Please enter Zip Code
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
                    <button type="submit" onClick="getQuote() error text-danger" class="btn-orange">
                        Request a Quote Now
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection