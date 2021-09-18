<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Parentcategory Id Field -->
<div class="form-group col-sm-6">

 

    <div class="form-group">
    {!! Form::label('category_id', 'ParentCategory:') !!}
  <select class="form-control" id="parentcategory_id" name="parentcategory_id">
    @foreach($parentcategory as $categories):
     <option value="{{ $categories->id }}" {{ ((isset($childcategory) && $categories->id == $childcategory->parentcategory_id) ? 'selected' : '') }}>{{ $categories->name }}</option>
    @endforeach
  </select>
</div>
   
</div>