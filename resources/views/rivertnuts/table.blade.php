<div class="table-responsive">
    <table class="table" id="rivertnuts-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
        {{-- <th>Key Details</th> --}}
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($rivertnuts as $rivertnut)
            <tr>
                <td>{{ $rivertnut->name }}</td>
                <td> <img src="{{url('/uploads/')}}/{{ $rivertnut->icon ?? '' }}" alt="Image" width="40px" height="40px"/></td>

            {{-- <td>{{ $rivertnut->key_details }}</td> --}}
                <td width="120">
                    {!! Form::open(['route' => ['rivertnuts.destroy', $rivertnut->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('rivertnuts.show', [$rivertnut->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('rivertnuts.edit', [$rivertnut->id]) }}" class='btn btn-default btn-xs'>
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
