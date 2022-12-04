@extends('layouts.admin')

@section('title', '')

@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            @if(session('message'))
                <div class="alert alert-success" role="alert">{{ session('message') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-primary text-center">
                        <i class="fa fa-shopping-cart text-dark"></i>My Order Details
                    </h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id: {{ $order->id }}</h6>
                            <h6>Tracking Id/no: {{ $order->tracking_no }}</h6>
                            <h6>Order Id: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                            <h6>Payment mode Id: {{ $order->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">
                                Order Status Message: <span class="text-uppercase">{{ $order->status_message }}</span>
                            </h6>
                        </div>
                    </div>

                    <div class="row">
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

                    <br>
                    <h5>Order Item </h5>
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
                                            <td>
                                                {{ $orderItem->product->name }}
                                                @if ($orderItem->productColor)
                                                    @if ($orderItem->productColor->color)
                                                        <span>- Color: {{ $orderItem->productColor->color->name }}</span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td width="10%">{{ $orderItem->price }}</td>
                                            <td width="10%">{{ $orderItem->quantity }}</td>
                                            <td width="10%"
                                                class="fw-bold">{{ $orderItem->quantity * $orderItem->price }}</td>
                                        </tr>
                                        @php
                                            $totalPrice += $orderItem->quantity * $orderItem->price;
                                        @endphp
                                    @endforeach

                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Amount:</td>
                                        <td colspan="1" class="fw-bold">{{ $totalPrice }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 card">
                    <div class="card-body">
                        <h4>Order Process (Order Status Updates)</h4>
                        <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank"
                           class="btn btn-primary float-end">View Invoice </a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" target="_blank"
                           class="btn btn-primary float-end">Download Invoice</a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}"
                           class="btn btn-primary float-end">Send Invoice Via mail</a>
                        <hr>
                        <div class="row">
                            <div class="col-md-5">
                                <form action="{{ route('admin.order.updateOrderStatus', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <label>Update Your Order Status</label>
                                    <div class="input-group">
                                        <select name="order_status" class="form-select">
                                            <option value="">Select Order Status</option>
                                            <option
                                                value="in progress" {{ Request::get('status') == 'in progress' ? 'selected': '' }} >
                                                In Progress
                                            </option>
                                            <option
                                                value="completed" {{ Request::get('status') == 'completed' ? 'selected': '' }}>
                                                Completed
                                            </option>
                                            <option
                                                value="pending" {{ Request::get('status') == 'pending' ? 'selected': '' }} >
                                                Pending
                                            </option>
                                            <option
                                                value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected': '' }}>
                                                Cancelled
                                            </option>
                                            <option
                                                value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected': '' }} >
                                                Out for delivery
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary text-white">Update</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-7">
                                <h4>Current Order Status: <span
                                        class="text-uppercase">{{ $order->status_message }}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
