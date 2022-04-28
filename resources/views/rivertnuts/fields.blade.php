<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('icon', 'Icon:') !!}
    {!! Form::file('icon') !!}

</div>

<div class="form-group col-sm-6">
<input  type="file" class="form-control" name="images[]" placeholder="address" multiple>
</div>


<!-- Key Details Field -->
<div class="form-group col-sm-6">
    {!! Form::label('key_details', 'Key Details:') !!}
    <textarea class="ckeditor form-control" name="key_details">{{ (isset($rivertnut) && $rivertnut['key_details']) ? $rivertnut['key_details'] : '' }}</textarea>

    {{-- {!! Form::text('key_details', null, ['class' => 'ckeditor form-control','maxlength' => 255,'maxlength' => 255]) !!} --}}
</div>


<div class="row">
    <div class="col-lg-12">

               <?php
                if(isset($rivertnut->getrevert) && $rivertnut->getrevert) {
                    foreach ($rivertnut->getrevert as $key => $value) {
                        ?>
<div id="inputFormRow">
    <div class="input-group mb-3">
<input type="text" name="title[]" class="form-control m-input m-2" placeholder="Enter title" autocomplete="off" value="{{ $value->title }}">
<input type="text" name="title_values[]" class="form-control m-input m-2" placeholder="Enter Values" autocomplete="off" value="{{ $value->title_values }}">
<input type="hidden" name="hidden[]" class="form-control m-input m-2" placeholder="Enter Values" autocomplete="off" value="{{ $value->id }}">


<div class="input-group-append">
    <button id="removeRow" type="button" class="btn btn-danger m-2">Remove</button>
</div>
</div>

</div>
<?php
                    }
                }

                ?>



        <div id="newRow"></div>
        <button id="addRow" type="button" class="btn btn-info">Add Row</button>
    </div>
</div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="text" name="title[]" class="form-control m-input m-2" placeholder="Enter title" autocomplete="off"><input type="text" name="title_values[]" class="form-control m-input m-2" placeholder="Enter Values" autocomplete="off"><input type="hidden" name="hidden[]" class="form-control m-input m-2" placeholder="Enter title" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger m-2">Remove</button>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>




