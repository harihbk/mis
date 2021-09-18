<!-- Part Number Field -->
<div class="col-sm-12">
    {!! Form::label('part_number', 'Part Number:') !!}
    <p>{{ $productPartNumber->part_number }}</p>
</div>

<!-- Dates To Ship Field -->
<div class="col-sm-12">
    {!! Form::label('dates_to_ship', 'Dates To Ship:') !!}
    <p>{{ $productPartNumber->dates_to_ship }}</p>
</div>

<!-- Nominal Thread M Field -->
<div class="col-sm-12">
    {!! Form::label('nominal_thread_m', 'Nominal Thread M:') !!}
    <p>{{ $productPartNumber->nominal_thread_m }}</p>
</div>

<!-- Nominal Thread Inch Field -->
<div class="col-sm-12">
    {!! Form::label('nominal_thread_inch', 'Nominal Thread Inch:') !!}
    <p>{{ $productPartNumber->nominal_thread_inch }}</p>
</div>

<!-- Product Length Field -->
<div class="col-sm-12">
    {!! Form::label('product_length', 'Product Length:') !!}
    <p>{{ $productPartNumber->product_length }}</p>
</div>

<!-- Pinch Field -->
<div class="col-sm-12">
    {!! Form::label('pinch', 'Pinch:') !!}
    <p>{{ $productPartNumber->pinch }}</p>
</div>

<!-- Detailed Ship Field -->
<div class="col-sm-12">
    {!! Form::label('detailed_ship', 'Detailed Ship:') !!}
    <p>{{ $productPartNumber->detailed_ship }}</p>
</div>

<!-- Mounting Hole Shape Field -->
<div class="col-sm-12">
    {!! Form::label('mounting_hole_shape', 'Mounting Hole Shape:') !!}
    <p>{{ $productPartNumber->mounting_hole_shape }}</p>
</div>

<!-- Basic Shape Field -->
<div class="col-sm-12">
    {!! Form::label('basic_shape', 'Basic Shape:') !!}
    <p>{{ $productPartNumber->basic_shape }}</p>
</div>

<!-- Material Field -->
<div class="col-sm-12">
    {!! Form::label('material', 'Material:') !!}
    <p>{{ $productPartNumber->material }}</p>
</div>

<!-- Surface Treatment Field -->
<div class="col-sm-12">
    {!! Form::label('surface_treatment', 'Surface Treatment:') !!}
    <p>{{ $productPartNumber->surface_treatment }}</p>
</div>

<!-- Tip Shape Field -->
<div class="col-sm-12">
    {!! Form::label('tip_shape', 'Tip Shape:') !!}
    <p>{{ $productPartNumber->tip_shape }}</p>
</div>

<!-- Additional Shape Field -->
<div class="col-sm-12">
    {!! Form::label('additional_shape', 'Additional Shape:') !!}
    <p>{{ $productPartNumber->additional_shape }}</p>
</div>

<!-- Sales Unit Field -->
<div class="col-sm-12">
    {!! Form::label('sales_unit', 'Sales Unit:') !!}
    <p>{{ $productPartNumber->sales_unit }}</p>
</div>

<!-- Application Field -->
<div class="col-sm-12">
    {!! Form::label('application', 'Application:') !!}
    <p>{{ $productPartNumber->application }}</p>
</div>

<!-- Strength Class Steel Field -->
<div class="col-sm-12">
    {!! Form::label('strength_class_steel', 'Strength Class Steel:') !!}
    <p>{{ $productPartNumber->strength_class_steel }}</p>
</div>

<!-- Strength Class Stainless Steel Field -->
<div class="col-sm-12">
    {!! Form::label('strength_class_stainless_steel', 'Strength Class Stainless Steel:') !!}
    <p>{{ $productPartNumber->strength_class_stainless_steel }}</p>
</div>

<!-- Screw Type Field -->
<div class="col-sm-12">
    {!! Form::label('screw_type', 'Screw Type:') !!}
    <p>{{ $productPartNumber->screw_type }}</p>
</div>

<!-- Manufacturer Field -->
<div class="col-sm-12">
    {!! Form::label('manufacturer', 'Manufacturer:') !!}
    <p>{{ $productPartNumber->manufacturer }}</p>
</div>

<!-- Sale Discount Field -->
<div class="col-sm-12">
    {!! Form::label('sale_discount', 'Sale Discount:') !!}
    <p>{{ $productPartNumber->sale_discount }}</p>
</div>

<!-- Cad Field -->
<div class="col-sm-12">
    {!! Form::label('cad', 'Cad:') !!}
    <p>{{ $productPartNumber->cad }}</p>
</div>

<!-- Modified By Field -->
<div class="col-sm-12">
    {!! Form::label('modified_by', 'Modified By:') !!}
    <p>{{ $productPartNumber->modified_by }}</p>
</div>

<!-- Product Id Field -->
<div class="col-sm-12">
    {!! Form::label('product_id', 'Product:') !!}
    <p>{{ $productPartNumber->product->name }}</p>
</div>


<div class="col-sm-12">
    {!! Form::label('product_id', 'Specification:') !!}
   <ul>
    @foreach($productPartNumber->specification as $spec)
          <li>  {{ $spec->name }}
                <ul>
                @foreach($spec->specificationTypes as $spec_type)
                <li> {{ $spec_type->spec_type }}</li>
                @endforeach
                </ul>
            </li>
    @endforeach
    </ul>
</div>



