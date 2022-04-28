@extends('frontend.theme')
@section('content')

<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css" />


<div class="container py-5">
    <div class="clearfix">

        @if (isset($message))
        <div class="alert alert-primary" role="alert">
            {{ $message }}
          </div>
        @endif



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

                <strong>Key Features:</strong>
                {!! $data->key_details !!}

            </div>
            <div class="col-md-6">

                <h5>Product Details:</h5>
                <table class="table table-bordered">
                    <?php
                    $datas = $data->getrevert;
                        foreach ($datas as $key => $value) {
                           ?>
                            <tr>
                                <th>{{ $value->title }}</th>
                                <td>{{ $value->title_values }}</td>
                            </tr>

            <?php
                        }
                        ?>
                </table>

                <button id="toogleEnquiry" class="btn btn-primary rounded" data-toggle="modal" data-target="#myModal"><i class="bi bi-telephone-fill"></i> Enquiry
                    Now</button>



                      <!-- The Modal -->
                      <div class="modal" id="myModal">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Enquiry</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>


                            <div class="modal-body">

                                <form method="post" action="{{ route('enquiry') }}">
                                    {!! csrf_field() !!}

                                    <div class="row contact-details">
                                        <div class="col-sm-6 mb-xs">
                                            <input class="gray_bg input_mr checkValidation" type="text" id="textarea" name="name"
                                                placeholder="Company Name" />

                                        </div>
                                    </div>
                                    <div class="row contact-details">
                                        <div class="col-sm-6 mb-xs">
                                            <input class="gray_bg input_mr checkValidation" type="text" id="textarea" name="email"
                                                placeholder="Company Email" />

                                        </div>
                                    </div>
                                    <div class="row contact-details">
                                        <div class="col-sm-6 mb-xs">
                                            <input class="gray_bg input_mr checkValidation" type="text" id="textarea" name="phoneno"
                                                placeholder="Company PhoneNo" />

                                        </div>
                                    </div>
                                    <div class="row contact-details">
                                        <div class="col-sm-6 mb-xs">
                                            <input class="gray_bg input_mr checkValidation" type="text" id="textarea" name="product"
                                                value="{{ $data->name }}" />

                                        </div>
                                    </div>
                                    <div class="row contact-details">
                                        <div class="col-sm-6 mb-xs">
                                            <input class="gray_bg input_mr checkValidation" type="text" id="textarea" name="quantity"
                                            placeholder="No of Quantity" />

                                        </div>
                                    </div>
                                    <div class="row contact-details">
                                        <div class="col-sm-6 mb-xs">
                                            <textarea class="gray_bg input_mr checkValidation" type="text" id="textarea" name="writeanote"
                                            placeholder="Write a Notes" ></textarea>

                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-sm-6 mb-xs">
                                           <input type="submit" class="btn btn-primary" value="Submit">
                                        </div>
                                    </div>

                                </form>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                          </div>
                        </div>
                      </div>


            </div>
        </div>

    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


<script src="{{ URL::to('/') }}/assetszoomer/zoom-image.js"></script>
<script src="{{ URL::to('/') }}/assetszoomer/main.js"></script>

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
