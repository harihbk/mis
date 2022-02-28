@extends('frontend.userprofiletheme',['title' => 'Edit Profile']);

@section('content')
<form action="{{ route('website.updatefrofile')}}" method="post">
    @csrf
    <table class="table">
        <tr>
            <th>Name</th>
            <td><input type="text" name="name" id="name" class="form-control" value="{{ $user->name ?? ''}}"></td>

        </tr>
        <tr>
         <th>Email</th>
         <td><input type="text" name="email" id="email" class="form-control" value="{{ $user->email ?? ''}}"></td>

     </tr>
     <tr>
         <th>Mobile No</th>
         <td><input type="text" name="mobileno" id="mobileno" class="form-control" value="{{ $user->mobileno ?? ''}}"></td>

     </tr>
     <tr>
         <th>Company</th>
         <td><input type="text" name="userCompany" id="userCompany" class="form-control" value="{{ $user->userCompany ?? ''}}"></td>

     </tr>
     <tr>
         <th>GST</th>
         <td><input type="text" name="userCompanyGST" id="userCompanyGST" class="form-control" value="{{ $user->userCompanyGST ?? ''}}"></td>

     </tr>
     <tr>
         <th>Newsletter</th>
         <td><input type="text" name="newsletter" id="newsletter" class="form-control" value="{{ $user->newsletter ?? ''}}">
        <input type="hidden" name="user_id" value="{{ $user->id ?? ''}}">
        </td>

     </tr>
     <tr>
         <th>created Date</th>
         <td>{{ $user->created_at ?? ''}}</td>

     </tr>
    </table>

    <input type="submit" value="submit" class="btn btn-primary">
</form>

@endsection
