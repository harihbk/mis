<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Child Name:') !!}
    <p>{{ $childcategory->name }}</p>
</div>

<!-- Parentcategory Id Field -->
<div class="col-sm-12">
    {!! Form::label('parentcategory_id', 'Parent category:') !!}
    <p>{{ $childcategory->parentcategory->name }}</p>

    {!! Form::label('parentcategory_id', 'Subcategory:') !!}
    <p>{{ $childcategory->parentcategory->subcategory->name }}</p>

    {!! Form::label('parentcategory_id', 'category:') !!}
    <p>{{ $childcategory->parentcategory->subcategory->category->name }}</p>
</div>

