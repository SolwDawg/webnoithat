@extends('layouts.app')

@section('title', 'orders')

@section('content')
    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="text-center"><h2 class="mb-5">My Orders List</h2></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                            <tr>
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
                                        <a href="{{ url('orders/'.$orderItem->id) }}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Orders Available</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex align-items-center flex-column px-4 pt-4">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection
