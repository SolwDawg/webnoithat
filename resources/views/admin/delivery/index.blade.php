@extends('layouts.admin')

@section('title', 'Delivery')

@section('content')

    <!-- Bootstrap Table with Header - Light -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Product</h4>
        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between mb-2">
                <h4 class="">Available Product Information</h4>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
            </div>
            <div class="card-body">
                <table class="table table-responsive text-nowrap delivery_datatable">
                    <thead class="table-light">
                    <tr>
                        <th>City</th>
                        <th>Province</th>
                        <th>Ward</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody></tbody>

                </table>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function () {
            let table = $('.delivery_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.delivery')!!}',
                columns: [
                    {data: 'city', name: 'city'},
                    {data: 'province', name: 'province'},
                    {data: 'ward', name: 'ward'},
                ],
            });
        });
    </script>
@endpush
