@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Create Sub Admin</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => 'users.store']) !!}

        <div class="card-body">

            <div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                </div>

                <div class="form-group col-sm-6">
                    <label for="email">E-mail *</label>
                    <input id="email" type="email" name="email" require class="form-control" placeholder="E-mail"
                        aria-label="email" aria-describedby="basic-addon1" required="required"
                        value="{{ old('email') }}">
                </div>

                <div class="form-group col-sm-6">
                    <label for="mobileno">Mobile Number *</label>
                    <input id="mobileno" name="mobileno" type="text" require required="required" class="form-control"
                        placeholder="Mobile Number" aria-label="mobileno" aria-describedby="basic-addon1"
                        value="{{ old('mobileno') }}">
                </div>

                <div class="form-group col-sm-6">
                    <label for="password">Password *</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Password"
                        aria-label="password" aria-describedby="basic-addon1" required="required">
                </div>

                <div class="form-group col-sm-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" checked  id="defaultCheck1" name="user_status">
                        <label class="form-check-label" for="defaultCheck1">
                          Status
                        </label>
                      </div>
                </div>

            </div>

        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
