<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
   
   
    <div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
  <select class="form-control" id="category_id" name="category_id">
    @foreach($category as $categories):
     <option value="{{ $categories->id }}" {{ ((isset($subcategory) && $categories->id == $subcategory->category_id) ? 'selected' : '') }}>{{ $categories->name }}</option>
    @endforeach
  </select>
</div>
   
</div>