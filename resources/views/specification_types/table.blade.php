<div class="table-responsive">
    <table class="table" id="specificationTypes-table">
        <thead>
            <tr>
                <th>Spec Type</th>
        <th>Description</th>
        <!-- <th>Image</th> -->
        <th>Specification</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($specificationTypes as $specificationType)
            <tr>
            <td>{{ $specificationType->spec_type }}</td>
            <td>{{ $specificationType->description }}</td>
            <!-- <td>{{ $specificationType->image }}</td> -->
            <td>{{ $specificationType->specification->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['specificationTypes.destroy', $specificationType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('specificationTypes.show', [$specificationType->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('specificationTypes.edit', [$specificationType->id]) }}" class='btn btn-default btn-xs'>
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
