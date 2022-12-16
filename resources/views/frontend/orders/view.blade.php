@extends('layouts.app')

@section('title', '')

@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-white-3">
                        <h3 class="text-primary text-center">
                            <i class="fa fa-shopping-cart text-primary"></i>  My Order Details
                        </h3>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="fw-bold">Order Details</h5>
                                <hr>
                                <h6>Order Id: {{ $order->id }}</h6>
                                <h6>Tracking Id/no: {{ $order->tracking_no }}</h6>
                                <h6>Order Id: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6>Payment mode Id: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Order Status Message: <span
                                        class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>

                            <div class="col-md-6">
                                <h5>User Details</h5>
                                <hr>
                                <h6>Full Name: {{ $order->fullname }}</h6>
                                <h6>Email: {{ $order->email }}</h6>
                                <h6>Phone: {{ $order->phone }}</h6>
                                <h6>Address: {{ $order->address }}</h6>
                                <h6>Pin code: {{ $order->pincode }}</h6>
                            </div>
                        </div>
                    </div>
                    <h3 class="pt-5 text-primary text-center">
                        Order Items
                    </h3>
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shopping__cart__table">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach($order->orderItems as $orderItem)
                                        <tr>
                                            <td width="10%">{{ $orderItem->id }}</td>
                                            <td width="10%">
                                                @if($orderItem->product->productImages)
                                                    <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                         style="width: 50px; height: 50px" alt="">
                                                @else

                                                @endif
                                            </td>
                                            <td width="30%">
                                                <h5>
                                                    {{ $orderItem->product->name }}
                                                    <br class="py-2">
                                                    @if ($orderItem->productColor)
                                                        @if ($orderItem->productColor->color)
                                                            <span>Color: {{ $orderItem->productColor->color->name }}</span>
                                                        @endif
                                                    @endif
                                                </h5>
                                            </td>
                                            <td width="20%">{{ number_format($orderItem->price, 0, ',', '.') }}
                                                VNĐ
                                            </td>
                                            <td width="10%" class="text-center"><h6>{{ $orderItem->quantity }}</h6></td>
                                            <td width="20%"
                                                class="fw-bold">{{ number_format($orderItem->quantity * $orderItem->price, 0, ',', '.') }}
                                                VNĐ
                                            </td>
                                        </tr>
                                        @php
                                            $totalPrice += $orderItem->quantity * $orderItem->price;
                                        @endphp
                                    @endforeach

                                    <tr>
                                        <td colspan="5" class="h5 fw-bold">Total Amount:</td>
                                        <td colspan="1" class="h6 fw-bold">{{ number_format($totalPrice, 0, ',', '.') }}
                                            VNĐ
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
