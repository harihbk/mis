@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{base64_decode(request()->route('type'))}} Details</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-default float-right" href="{{url('users/'. request()->route('type'))}}">
                    Back
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    {!! Form::label('name', 'Name:') !!}
                    <p>{{ $user->name }}</p>
                </div>

                <div class="col-sm-12">
                    {!! Form::label('email', 'Email:') !!}
                    <p>{{ $user->email }}</p>
                </div>

                <div class="col-sm-12">
                    {!! Form::label('mobileno', 'Mobile No:') !!}
                    <p>{{ $user->mobileno }}</p>
                </div>
            </div>
        </div>

    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush" id="products-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Childcategory</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>@if($product->image)<img src="{{url('/uploads/')}}/{{ $product->image }}" alt="Image" width="40px" height="40px" />@endif</td>
                    <td>{{ $product->childcategory->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
