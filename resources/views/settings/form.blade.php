@extends('layouts.app')

@section('content')

 <div class="container">
      <h1>Settings</h1>
    @if (Session::has('successMsg'))
    <div class="alert alert-info">{{ Session::get('successMsg') }}</div>
 @endif

    <form action="{{ route('setting.store') }}" method="post">
        @csrf()
        <div class="form-group">
            <label for="">Discount Status</label>
            <select name="discount_status" id="discount_status" class="form-control">
                <option value="">Select</option>
                <option value="0" {{ (isset($data) && $data->discount_status == 0  ? 'selected' : '')}}>No</option>
                <option value="1" {{ (isset($data) && $data->discount_status == 1  ? 'selected' : '')}}>Yes</option>
            </select>
        </div>

        <div class="form-group" id="discount1">
            <label for="">Discount Amount</label>
           <input type="text" name="discount" class="form-control" id="discount" value="{{ $data->discount ?? '' }}">
        </div>

        <div class="form-group">
            <label for="">IGST(%)</label>
            <input type="text" name="igst" class="form-control" id="igst" value="{{ $data->igst ?? '' }}">
         </div>

         <div class="form-group">
            <label for="">CGST(%)</label>
            <input type="text" name="cgst" class="form-control" id="cgst" value="{{ $data->cgst ?? '' }}">
         </div>

         <div class="form-group">
            <label for="">SGST(%)</label>
            <input type="text" name="sgst" class="form-control" id="sgst" value="{{ $data->sgst ?? '' }}">
         </div>
         <br>
         <div class="form-group">
             <input type="submit" value="submit" name="submit" class="form-control btn btn-success">
         </div>
    </form>
 </div>


@endsection
