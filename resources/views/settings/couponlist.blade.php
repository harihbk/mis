@extends('layouts.app')

@section('content')

 <div class="container">
      <h1>Create Coupon</h1>

    <form action="{{ route('promocode') }}" method="post">
        @csrf()
        <div class="form-group">
                <label for="no_of_promocode">No Of Promocode</label>
                <input type="text" name="amount" id="amount" class="form-control">
        </div>

            <div class="form-group">
                <label for="amount">Discount(%)</label>
                <input type="text" name="reward" id="reward" class="form-control">
            </div>
            <div class="form-group">
                <label for="no_of_days">No of Days</label>
                <input type="text" name="expires_in" id="expires_in" class="form-control">
            </div>
            <div class="form-group">
                <label for="">How many times can promocode be used</label>
                <input type="text" name="quantity" id="quantity" class="form-control">
            </div>

            <div class="form-group">
            <input type="submit" value="submit" name="submit" class="btn btn-primary">
            </div>

    </form>
 </div>


@endsection
