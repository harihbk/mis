<div class="table-responsive">
    <table class="table" id="specifications-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($specifications as $specification)
            <tr>
                <td>{{ $specification->name }}</td>
            <td>{{ $specification->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['specifications.destroy', $specification->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('specifications.show', [$specification->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('specifications.edit', [$specification->id]) }}" class='btn btn-default btn-xs'>
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
