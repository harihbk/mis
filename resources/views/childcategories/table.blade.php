<div class="table-responsive">
    <table class="table" id="childcategories-table">
        <thead>
            <tr>
                <th>Name</th>
                 <th>Parentcategory</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($childcategories as $childcategory)
            <tr>
                <td>{{ $childcategory->name ?? ''}}</td>
            <td>{{ $childcategory->parentcategory->name ?? ''}}</td>
                <td width="120">
                    {!! Form::open(['route' => ['childcategories.destroy', $childcategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('childcategories.show', [$childcategory->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('childcategories.edit', [$childcategory->id]) }}" class='btn btn-default btn-xs'>
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
