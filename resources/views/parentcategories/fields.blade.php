<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Subcategory Id Field -->
<div class="form-group col-sm-6">

    <div class="form-group">
    {!! Form::label('category_id', 'Subcategory:') !!}
  <select class="form-control" id="subcategory_id" name="subcategory_id">
    @foreach($subcategory as $categories):
     <option value="{{ $categories->id }}" {{ ( (isset($parentcategory) && $categories->id == $parentcategory->subcategory_id) ? 'selected' : '') }}>{{ $categories->name }}</option>
    @endforeach
  </select>
</div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('icon', 'Icon:') !!}
    {!! Form::file('icon') !!}

</div>

