<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Modified By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('modified_by', 'Modified By:') !!}
    {!! Form::text('modified_by', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div> -->

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>

<!-- Childcategory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('childcategory_id', 'Childcategory :') !!}
    <select class="form-control" id="childcategory_id" name="childcategory_id">
    @foreach($childcategory as $categories):
     <option value="{{ $categories->id }}" {{ ( (isset($product) && $categories->id == $product->childcategory_id) ? 'selected' : '') }}>{{ $categories->name }}</option>
    @endforeach
  </select>
</div>

