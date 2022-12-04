@extends('layouts.admin')

@section('title', 'orders')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">All orders</h5>

            <div class="row">
                <form action="" method="">
                    <div class="col-md-3">
                        <label>Filter by Date</label>
                        <input type="date" name="date" class="form-control"
                               value="{{ Request::get('date') ?? date('Y-m-d') }}"/>
                    </div>
                    <div class="col-md-3">
                        <label>Filter by Status</label>
                        <select class="form-select" name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected': '' }} >In Progress</option>
                            <option value="completed"  {{ Request::get('status') == 'completed' ? 'selected': '' }}>Completed</option>
                            <option value="pending" {{ Request::get('status') == 'pending' ? 'selected': '' }} >Pending</option>
                            <option value="cancelled"  {{ Request::get('status') == 'cancelled' ? 'selected': '' }}>Cancelled</option>
                            <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected': '' }} >Out for delivery</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
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
                    <tbody>
                    @forelse($orders as $orderItem)
                        <tr>
                            <td>{{ $orderItem->id }}</td>
                            <td>{{ $orderItem->tracking_no }}</td>
                            <td>{{ $orderItem->fullname }}</td>
                            <td>{{ $orderItem->payment_mode }}</td>
                            <td>{{ $orderItem->created_at->format('d-m-Y') }}</td>
                            <td>{{ $orderItem->status_message }}</td>
                            <td>
                                <a href="{{ route('admin.order.show', $orderItem->id) }}"
                                   class="btn btn-primary">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No Orders Available</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
