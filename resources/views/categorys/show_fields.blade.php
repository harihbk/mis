<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $categorys->name }}</p>
</div>

<!-- Icon Field -->
<div class="col-sm-12">
    {!! Form::label('icon', 'Icon:') !!}
  
    <p><img src="{{url('/uploads/')}}/{{ $categorys->icon }}" alt="Image" width="80px" height="80px"/></p>
</div>

