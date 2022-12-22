@extends('layouts.admin')

@section('title', 'Delivery')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h3 class="card-header">All Delivery</h3>
            <div class="table-responsive text-nowrap p-3">
                <table class="table" id="delivery-Datatables">
                    <thead>
                    <tr class="text-nowrap">
                        <th>City</th>
                        <th>Province</th>
                        <th>Ward</th>
                        <th>Fee Ship</th>
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
            let table = $('#delivery-Datatables').DataTable({
                select: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.delivery.list') }}",
                columns: [
                    {data: 'fee_city', name: 'fee_city'},
                    {data: 'fee_province', name: 'fee_province'},
                    {data: 'fee_wards', name: 'fee_wards'},
                    {data: 'fee_feeship', name: 'fee_feeship'},
                ],
            })
        })
    </script>

@endpush
