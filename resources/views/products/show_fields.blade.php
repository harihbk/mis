<div class="col-sm-12">
    {!! Form::label('childcategory_id', 'category:') !!}
    <p>{{ $product->childcategory->parentcategory->subcategory->category->name }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('childcategory_id', 'Subcategory:') !!}
    <p>{{ $product->childcategory->parentcategory->subcategory->name }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('childcategory_id', 'Parentcategory:') !!}
    <p>{{ $product->childcategory->parentcategory->name }}</p>
</div>

<!-- Childcategory Id Field -->
<div class="col-sm-12">
    {!! Form::label('childcategory_id', 'Childcategory:') !!}
    <p>{{ $product->childcategory->name }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('name', 'Product Name:') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $product->description }}</p>
</div>

<!-- Modified By Field -->


<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    <p><img src="{{url('/uploads/')}}/{{ $product->image }}" alt="Image" width="40px" height="40px"/></p>
</div>









