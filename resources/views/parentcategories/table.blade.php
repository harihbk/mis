<div class="table-responsive">
    <table class="table" id="parentcategories-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Subcategory</th>
        <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($parentcategories as $parentcategory)
            <tr>
                <td>{{ $parentcategory->name }}</td>
            <td>{{ $parentcategory->subcategory->name }}</td>
            <td> <img src="{{url('/uploads/')}}/{{ $parentcategory->icon }}" alt="Image" width="40px" height="40px"/></td>
                <td width="120">
                    {!! Form::open(['route' => ['parentcategories.destroy', $parentcategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('parentcategories.show', [$parentcategory->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('parentcategories.edit', [$parentcategory->id]) }}" class='btn btn-default btn-xs'>
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
