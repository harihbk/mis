<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $rivertnut->name }}</p>
</div>


<div class="col-sm-12">
    {!! Form::label('name', 'Product immage:') !!}
    <br>
     <img src="{{url('/uploads/')}}/{{ $rivertnut->icon ?? '' }}" alt="Image" width="80px" height="80px"/>

</div>

<div class="col-sm-12">
    {!! Form::label('name', 'Images:') !!}
<br>
    <?php
    $variable = explode("|",$rivertnut->images);

    foreach ($variable as $key => $value) {
        ?>
 <img src="{{url('/image/')}}/{{ $value ?? '' }}" alt="Image" width="80px" height="80px"/>
 <br>
        <?php
    }


        ?>

</div>

<div class="col-sm-12">
    <table style="width: 100%" >
        <?php
        $datas = $rivertnut->getrevert;
            foreach ($datas as $key => $value) {
               ?>
                <tr>
                    <th>{{ $value->title }}</th>
                    <td>{{ $value->title_values }}</td>
                </tr>

<?php
            }
            ?>

    </table>
</div>

<!-- Key Details Field -->
<div class="col-sm-12">
    {!! Form::label('key_details', 'Key Details:') !!}
    <p>{!! $rivertnut->key_details !!}</p>
</div>

