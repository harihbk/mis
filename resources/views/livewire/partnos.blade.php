

<div class="table-responsive">
     <input type="hidden" class="checkfield" value="{{ count($dynamicfield) > 0 ? count($dynamicfield) : 0}}">
     <span id="result"></span>
     <table class="table table-bordered table-striped" id="user_table">
   <thead>
    <tr>
        <th width="35%">Label</th>
        <th width="35%">Value</th>
        <th width="10%">Status</th>
        <th width="30%">Action</th>
    </tr>
   </thead>
   <tbody>
       @forelse ($dynamicfield as $k=>$v)
       <tr>
        <td><input type="text" name="addmore[{{$k}}][_label]" class="form-control" value="{{ $v->_label }}"/></td>
        <td><input type="text" name="addmore[{{$k}}][_value]" class="form-control" value="{{ $v->_value }}"/></td>
        <td><input type="checkbox" name="addmore[{{$k}}][_status]" class="form-control" value="1" {{ $v->_status == 1 ? 'checked' : '' }}/></td>
        @if ($k == 0)
        <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>
            @else
        <td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td>
        @endif

       </tr>
       @empty
       <tr>
        <td><input type="text" name="addmore[0][_label]" class="form-control" /></td>
        <td><input type="text" name="addmore[0][_value]" class="form-control" /></td>
        <td><input type="checkbox" name="addmore[0][_status]" class="form-control" value="1" /></td>
        <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>
       @endforelse

   </tbody>

</table>

</div>
