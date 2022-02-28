@extends('layouts.app')

@section('content')

    <div class="container">


       <form action="{{ route('updateprofilebyid')}}" method="post">
            @csrf
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $profile->name }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $profile->email }}" disabled>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Mobile No</label>
                    <input type="text" name="mobileno" id="mobileno" class="form-control" value="{{ $profile->mobileno }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Company</label>
                    <input type="text" name="userCompany" id="userCompany" class="form-control" value="{{ $profile->userCompany }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">GST</label>
                    <input type="text" name="userCompanyGST" id="userCompanyGST" class="form-control" value="{{ $profile->userCompanyGST }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Newsletter</label>
                    <input type="text" name="newsletter" id="newsletter" class="form-control" value="{{ $profile->newsletter }}">
                </div>
                <input type="hidden" name="user_id" value="{{ $profile->user_id }}">
                <input type="hidden" name="id" value="{{ $profile->id }}">
            </div>


            <div class="col-sm-2">
                <input type="submit" value="submit" class="btn btn-primary">

            </div>

           
        </form>




    </div>


@endsection
