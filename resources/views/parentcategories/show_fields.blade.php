<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $parentcategory->name }}</p>
</div>

<!-- Subcategory Id Field -->
<div class="col-sm-12">
{!! Form::label('subcategory_id', 'Category:') !!}
<p>{{ $parentcategory->subcategory->category->name }}</p>

    {!! Form::label('subcategory_id', 'Subcategory:') !!}
    
    <p>{{ $parentcategory->subcategory->name }}</p>
</div>

