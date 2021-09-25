<div class="table-responsive">
    <table class="table" id="productPartNumbers-table">
        <thead>
            <tr>
        <th>Part Number</th>
        <th>Dates To Ship</th>
        <th>Nominal Thread M</th>
        <th>Image</th>

        <th>Product</th>
        <th>Specification</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productPartNumbers as $productPartNumber)
            <tr>
                <td>{{ $productPartNumber->part_number ?? '' }}</td>
            <td>{{ $productPartNumber->dates_to_ship ?? '' }}</td>
            <td>{{ $productPartNumber->nominal_thread_m ?? '' }}</td>
            {{-- <td>{{ $productPartNumber->nominal_thread_inch }}</td> --}}
            <td> <img src="{{url('/uploads/')}}/{{ $productPartNumber->icon ?? '' }}" alt="Image" width="40px" height="40px"/></td>


            <td>{{ $productPartNumber->product->name ?? '' }}</td>

            <td>
            @foreach($productPartNumber->specification as $spec)
            {{ $spec->name }}<br>
            @endforeach


            </td>
                <td width="120">
                    {!! Form::open(['route' => ['productPartNumbers.destroy', $productPartNumber->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productPartNumbers.show', [$productPartNumber->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('productPartNumbers.edit', [$productPartNumber->id]) }}" class='btn btn-default btn-xs'>
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
