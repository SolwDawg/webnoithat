@extends('layouts.app')

@section('title', 'orders')

@section('content')

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
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

                        <div>
                            {{ $orders->links() }}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection
