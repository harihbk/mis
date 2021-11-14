@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif

        <table class="table" id="table">
            <thead>
            <tr>
                
                <th>name</th>
                <th>email</th>
                <th>mobileno</th>
                <th>status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($Profilechanges as $item)
                    <tr>
                        <td>{{ $item->name ?? '' }}</td>
                        <td>{{ $item->email ?? ''}}</td>
                        <td>{{ $item->mobileno ?? '' }}</td>
                        <td>Pending</td>
                        <td><a href="{{ route('profileupdate',$item->id) }}" class="btn btn-primary">Update</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>




    </div>


@endsection
