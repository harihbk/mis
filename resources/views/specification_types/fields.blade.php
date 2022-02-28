<!-- Spec Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('spec_type', 'Spec Type:') !!}
    {!! Form::text('spec_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Image Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div> -->

<!-- Specification Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('specification_id', 'Specification Id:') !!}

    <select class="form-control" id="specification_id" name="specification_id">
    @foreach($specification as $categories):
     <option value="{{ $categories->id }}" {{ ( (isset($specificationType) && $categories->id == $specificationType->specification_id) ? 'selected' : '') }}>{{ $categories->name }}</option>
    @endforeach
  </select>

</div>