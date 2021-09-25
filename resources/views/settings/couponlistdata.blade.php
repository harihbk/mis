@extends('layouts.app')

@section('content')

 <div class="container">
      <h1>Coupon list</h1>
      <a href="{{ route('createcoupon') }}" class="btn btn-primary">Create</a>
      <table class="table table-bordered promocode-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Code</th>
                <th>Rewards </th>
                <th>Quantity</th>
                <th>Expired at</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($promocode as $k=>$item)
                <tr>
                    <td>{{ $k+1 }}</td>
                    <td>{{ $item->code ?? ''}}</td>
                    <td>{{ $item->reward ?? '' }}</td>
                    <td>{{ $item->quantity ?? '' }}</td>
                    <td>{{ $item->expires_at ?? '' }}</td>
                    <td>@foreach ( $item->users as $user)
                         {{ $user->email ?? ''}}<br>
                    @endforeach</td>
                </tr>

            @endforeach

        </tbody>
    </table>

 </div>
 @endsection
