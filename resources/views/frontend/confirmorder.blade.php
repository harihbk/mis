
@extends('frontend.theme')

@section('content')


<!-- start page content -->
<div class="container">
    <h1 class="title page-title"><span>Your order has been placed!</span></h1>

    <div id="common-success" class="container">
        <div class="row">
                      <div id="content" class="col-sm-12">

            <p>Your order has been successfully processed!</p>

            {{-- <p>You can view your order history by going to the <a href="https://nowkart.in/index.php?route=account/account">my account</a> page and by clicking on <a href="https://nowkart.in/index.php?route=account/order">history</a>.</p><p>If your purchase has an associated download, you can go to the account <a href="https://nowkart.in/index.php?route=account/download">downloads</a> page to view them.</p><p>Please direct any questions you have to the <a href="https://nowkart.in/index.php?route=information/contact">store owner</a>.</p><p>Thanks for shopping with us online!</p>
            --}}
            <div class="buttons">
              <div class="pull-right"><a href="{{ URL::to('website')}}" class="btn btn-primary">Continue</a></div>
            </div>
            </div>
          </div>
      </div>

</div>

    @endsection
