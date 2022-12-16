@extends('layouts.admin')

@section('title', 'orders')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h3 class="card-header">All orders</h3>
            <div class="table-responsive text-nowrap p-3">
                <table class="table order-Datatables">
                    <thead>
                    <tr class="text-nowrap">
                        <th>ID</th>
                        <th>Tracking No</th>
                        <th>username</th>
                        <th>Payment Mode</th>
                        <th>Ordered Date</th>
                        <th>Status Message</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('script')

    <script type="text/javascript">
        $(function () {
            let table = $('.order-Datatables').DataTable({
                select: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.orders.list') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'tracking_no', name: 'tracking_no'},
                    {data: 'fullname', name: 'fullname'},
                    {data: 'payment_mode', name: 'payment_mode'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status_message', name: 'status_message'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    },
                ],
            })
        })
    </script>

@endpush
