<div class="table-responsive">
    <table class="table" id="categorys-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Icon</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categorys as $categorys)
            <tr>
                <td>{{ $categorys->name }}</td>

                <td> <img src="{{url('/uploads/')}}/{{ $categorys->icon }}" alt="Image" width="40px" height="40px"/></td>

          
                <td width="120">
                    {!! Form::open(['route' => ['categorys.destroy', $categorys->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('categorys.show', [$categorys->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('categorys.edit', [$categorys->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
