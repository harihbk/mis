@extends('layouts.app')

@section('content')
    <div class="content px-3">

{!! $orderdetail !!}

<form action="{{ route('confirm.order') }}" method="POST">
    @csrf()
    <input type="hidden" name="order_id" value="{{ $order_id }}">
    <div class="form-group">
        <select name="order_status_id" id="order_status_id" class="form-control ">
            @foreach ($order_status as $item)
                <option value="{{ $item->order_status_id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name="description">
    </div>



    <div class="form-group">
        <input type="submit" value="submit" class="form-control btn btn-success">

    </div>
</form>

<br>
{!! $orderhistory !!}

    </div>
@endsection
