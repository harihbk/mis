@extends('frontend.userprofiletheme',['title' => 'View Order']);
@section('content')
                        <table class="table table-bordered yajra-datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <script>
                            $(function () {

                       var table = $('.yajra-datatable').DataTable({
                           processing: true,
                           serverSide: true,
                           ajax: "{{ route('order.getuseOrders') }}",
                           columns: [
                               {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                               {data: 'billing_name', name: 'billing_name'},
                               {data: 'billing_email', name: 'billing_email'},
                               {data: 'billing_city', name: 'billing_city'},
                               {data: 'billing_phone', name: 'billing_phone'},
                               {data: 'order_status_id', name: 'order_status_id' },
                               {
                                   data: 'action',
                                   name: 'action',
                                   orderable: true,
                                   searchable: true
                               },
                           ]
                       });
                       });
                       </script>
@endsection


