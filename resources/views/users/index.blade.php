@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{base64_decode(request()->route('type'))}} Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{url('users/create/'. request()->route('type'))}}"> Create New {{base64_decode(request()->route('type'))}}</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Mobile</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
        {{$user->mobileno}}
      {{-- @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label >{{ $v }}</label>
        @endforeach
      @endif --}}
    </td>
    <td>
       <a class="btn btn-info" href="{{url('users/show/'. request()->route('type').'/'.$user->id)}}"> <i class="far fa-eye"></i></a>
       <a class="btn btn-primary" href="{{url('users/edit/'. request()->route('type').'/'.$user->id)}}"> <i class="far fa-edit"></i></a>
        {!! Form::open(['method' => 'DELETE','url' => url('users/delete/'. request()->route('type').'/'.$user->id),'style'=>'display:inline']) !!}
        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' =>
        'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection
