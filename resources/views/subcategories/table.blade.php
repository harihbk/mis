<div class="table-responsive">
    <table class="table" id="subcategories-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($subcategories as $subcategory)
            <tr>
                <td>{{ $subcategory->name ?? '' }}</td>
                <td>{{ $subcategory->category->name ?? '' }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['subcategories.destroy', $subcategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('subcategories.show', [$subcategory->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('subcategories.edit', [$subcategory->id]) }}" class='btn btn-default btn-xs'>
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
