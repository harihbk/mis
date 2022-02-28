
@include('frontend.header')

<link rel="stylesheet" href="{{ Url::to('assets/profile.css')}}" />
<div class="container py-3">
    <div class="clearfix">
        <h1 class="profile-title">Profile</h1>
        <div class="profile-info-wrapper">
            <div class="profile-image">

                    <img class="profile-avator" src="{{url('images/profile-avatar.jpeg')}}" alt="Profile Avatar">

            </div>
            <div class="profile-name-bg">
                Hello <span class="profile-name"> {{ auth()->user()->email ?? '' }}</span> Welcome!!!
            </div>
        </div>
    </div>
    <div class="clearfix">
    <button class="btn btn-change-profile btn-success border-0 rounded-0" data-toggle="modal" data-target="#myModal">Change Profile</button>
    <!-- Modal starts -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <h4 class="modal-title">Change Profile</h4>
          </div>
          <div class="modal-body">
                <form action="?action=upload" method="post" enctype="multipart/form-data">
                    <b>Profile Photo:</b>
                    <div class="custom-file mb-3">
                      <input type="file" class="custom-file-input" id="profilepicture" name="profilepicture" required>
                      <br/><small>To change profile photo upload new picture.</small>
                      <br/><small>Supported Image Formats are .jpg, .jpeg, .png..</small>
                    </div>
                    <div class="mt-3">
                      <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- Modal content-->
        </div>
    </div>
    <!-- Modal Ends -->
    </div>
    <div class="clearfix">
        <div class="row">
            <div class="col-md-3">


                <div class="panel panel-default">

                    <div class="panel-body">
                        <h3>Account</h3>

            <a href="{{ route('history') }}"><h6>Order History</h6></a>


                    </div>
                  </div>

            </div>
            <div class="col-md-9">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Orders</h1>
                            </div>

                        </div>
                    </div>
                </section>

                <div class="content px-3">


    <div class="content px-3">

        {!! $orderdetail !!}


        {!! $orderhistory !!}

            </div>




                </div>
            </div>
        </div>
    </div>
</div>


@include('frontend.footer')







