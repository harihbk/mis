<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $specification->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $specification->description }}</p>
</div>


<div class="col-sm-12">
    {!! Form::label('description', 'Specification Type:') !!}
    @foreach($specification->specificationTypes as $data)

      <p>{{ $data->spec_type }}</p>
    @endforeach
</div>

