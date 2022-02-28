@extends('frontend.userprofiletheme',['title' => 'View Profile']);

@section('content')
<table class="table">
    <tr>
        <th>Name</th>
        <td>{{ $user->name ?? ''}}</td>

    </tr>
    <tr>
     <th>Email</th>
     <td>{{ $user->email ?? ''}}</td>

 </tr>
 <tr>
     <th>Mobile No</th>
     <td>{{ $user->mobileno ?? ''}}</td>

 </tr>
 <tr>
     <th>Company</th>
     <td>{{ $user->userCompany ?? ''}}</td>

 </tr>
 <tr>
     <th>GST</th>
     <td>{{ $user->userCompanyGST ?? ''}}</td>

 </tr>
 <tr>
     <th>Newsletter</th>
     <td>{{ $user->newsletter ?? ''}}</td>

 </tr>
 <tr>
     <th>created Date</th>
     <td>{{ $user->created_at ?? ''}}</td>

 </tr>
</table>
@endsection